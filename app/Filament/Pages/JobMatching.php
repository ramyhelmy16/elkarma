<?php

namespace App\Filament\Pages;

use App\Models\Applicant;
use App\Models\Occupation;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Schemas\Components\Section;

class JobMatching extends Page implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    public ?int $selected_applicant_id = null;
    public ?Applicant $selectedApplicant = null;

    protected ?string $heading = 'البحث عن الوظائف للمتقدمين';

    protected string $view = 'filament.pages.job-matching';

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Select::make('selected_applicant_id')
                ->label('اختر المتقدم')
                ->extraFieldWrapperAttributes(['style' => 'margin-bottom: 1.5rem;'])
                ->placeholder('-- اختر متقدم --')
                ->options(Applicant::all()->pluck('full_name', 'id')->toArray())
                ->searchable()
                ->reactive()
                ->afterStateUpdated(function ($state) {
                    $this->selected_applicant_id = $state;
                    $this->selectedApplicant = $state ? Applicant::find($state) : null;
                    $this->resetTable();
                }),

        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $query = Occupation::query()->where('is_active', true);

                if ($this->selectedApplicant) {
                    $applicant = $this->selectedApplicant;

                    if ($applicant->education_level_id) {
                        $query->where('education_level_id', $applicant->education_level_id);
                    }

                    // $totalExperience = $applicant->workExperiences->sum('years_of_experience');
                    // if ($totalExperience > 0) {
                    //     $query->where('experience_level_id', '<=', $this->getExperienceLevelFromYears($totalExperience));
                    // }

                    // if ($applicant->job_type_id) {
                    //     $query->where('job_type_id', $applicant->job_type_id);
                    // }

                    // if ($applicant->gender_id) {
                    //     $query->where(function ($q) use ($applicant) {
                    //         $q->whereNull('gender_id')
                    //             ->orWhere('gender_id', $applicant->gender_id);
                    //     });
                    // }

                    // if ($applicant->area_id) {
                    //     $query->where('area_id', $applicant->area_id);
                    // }

                    // if ($applicant->dob) {
                    //     $age = now()->diffInYears($applicant->dob);
                    //     $query->where(function ($q) use ($age) {
                    //         $q->whereNull('age_min')
                    //             ->orWhere('age_min', '<=', $age);
                    //     })->where(function ($q) use ($age) {
                    //         $q->whereNull('age_max')
                    //             ->orWhere('age_max', '>=', $age);
                    //     });
                    // }

                    // if ($applicant->qualification_id) {
                    // }
                }

                return $query;
            })
            ->columns([
                TextColumn::make('jobTitle.name')
                    ->label('المسمى الوظيفي')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('company.name')
                    ->label('الشركة')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('educationLevel.name')
                    ->label('المؤهل المطلوب')
                    ->formatStateUsing(function ($state, $record) {
                        if (app()->getLocale() === 'ar') {
                            return $record->educationLevel?->nameAR ?? $state;
                        }
                        return $record->educationLevel?->name ?? $state;
                    }),

                TextColumn::make('experienceLevel.name')
                    ->label('مستوى الخبرة')
                    ->formatStateUsing(function ($state, $record) {
                        if (app()->getLocale() === 'ar') {
                            return $record->experienceLevel?->nameAR ?? $state;
                        }
                        return $record->experienceLevel?->name ?? $state;
                    }),

                TextColumn::make('area.name')
                    ->label('المنطقة'),

                TextColumn::make('salary_min')
                    ->label('الراتب')
                    ->formatStateUsing(function ($state, $record) {
                        return number_format($record->salary_min, 2) . ' - ' . number_format($record->salary_max, 2);
                    }),

                TextColumn::make('application_deadline')
                    ->label('آخر موعد للتقديم')
                    ->date(),

                TextColumn::make('match_percentage')
                    ->label('نسبة المطابقة')
                    ->badge()
                    ->color(fn($record): string => $this->getMatchPercentageColor($record))
                    ->getStateUsing(function ($record) {
                        if (!$this->selectedApplicant) {
                            return 'لم يتم الاختيار';
                        }
                        return $this->calculateMatchPercentage($record, $this->selectedApplicant) . '%';
                    }),
            ])
            ->filters([
                SelectFilter::make('job_title_id')
                    ->label('المسمى الوظيفي')
                    ->relationship('jobTitle', 'name'),

                SelectFilter::make('company_id')
                    ->label('الشركة')
                    ->relationship('company', 'name'),

                SelectFilter::make('area_id')
                    ->label('المنطقة')
                    ->relationship('area', 'name'),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('لا توجد وظائف متاحة')
            ->emptyStateDescription('عند اختيار متقدم، ستظهر الوظائف المناسبة هنا');
    }

    private function calculateMatchPercentage(Occupation $job, Applicant $applicant): int
    {
        $criteria = [];
        $matched = [];

        // المؤهل الدراسي (30%)
        $criteria['education'] = 30;
        if ($job->education_level_id && $applicant->education_level_id) {
            if ($job->education_level_id == $applicant->education_level_id) {
                $matched['education'] = 30;
            } elseif ($this->isEducationLevelHigher($applicant->education_level_id, $job->education_level_id)) {
                $matched['education'] = 25; // مؤهل أعلى من المطلوب
            } else {
                $matched['education'] = 15; // مؤهل أقل من المطلوب
            }
        } else {
            $matched['education'] = 30; // إذا لم يحدد مؤهل
        }

        // الخبرة (25%)
        $criteria['experience'] = 25;
        $applicantExperience = $applicant->workExperiences->sum('years_of_experience');
        if ($job->experience_level_id) {
            // هذا يعتمد على كيفية تخزين مستويات الخبرة
            $requiredExperience = $this->getExperienceYearsFromLevel($job->experience_level_id);
            if ($applicantExperience >= $requiredExperience) {
                $matched['experience'] = 25;
            } elseif ($applicantExperience >= $requiredExperience * 0.7) {
                $matched['experience'] = 20;
            } elseif ($applicantExperience >= $requiredExperience * 0.5) {
                $matched['experience'] = 15;
            } else {
                $matched['experience'] = 10;
            }
        } else {
            $matched['experience'] = 25;
        }

        // المنطقة (15%)
        $criteria['area'] = 15;
        if ($job->area_id && $applicant->area_id) {
            $matched['area'] = ($job->area_id == $applicant->area_id) ? 15 : 5;
        } else {
            $matched['area'] = 15;
        }

        // نوع الوظيفة (10%)
        $criteria['job_type'] = 10;
        if ($job->job_type_id && $applicant->job_type_id) {
            $matched['job_type'] = ($job->job_type_id == $applicant->job_type_id) ? 10 : 5;
        } else {
            $matched['job_type'] = 10;
        }

        // الجنس (10%)
        $criteria['gender'] = 10;
        if ($job->gender_id && $applicant->gender_id) {
            $matched['gender'] = ($job->gender_id == $applicant->gender_id) ? 10 : 0;
        } else {
            $matched['gender'] = 10;
        }

        // العمر (10%)
        $criteria['age'] = 10;
        if ($applicant->dob) {
            $age = now()->diffInYears($applicant->dob);
            if ($job->age_min && $job->age_max) {
                $matched['age'] = ($age >= $job->age_min && $age <= $job->age_max) ? 10 : 5;
            } elseif ($job->age_min) {
                $matched['age'] = ($age >= $job->age_min) ? 10 : 5;
            } elseif ($job->age_max) {
                $matched['age'] = ($age <= $job->age_max) ? 10 : 5;
            } else {
                $matched['age'] = 10;
            }
        } else {
            $matched['age'] = 10;
        }

        return array_sum($matched);
    }

    private function getMatchPercentageColor($record): string
    {
        if (!$this->selectedApplicant) {
            return 'gray';
        }

        $percentage = $this->calculateMatchPercentage($record, $this->selectedApplicant);

        return match (true) {
            $percentage >= 80 => 'success',
            $percentage >= 60 => 'warning',
            $percentage >= 40 => 'danger',
            default => 'gray',
        };
    }

    // دوال مساعدة - تحتاج لتعديل حسب هيكل قاعدة البيانات الخاصة بك
    private function getExperienceLevelFromYears($years): int
    {
        if ($years < 1) return 1;
        if ($years < 3) return 2;
        if ($years < 5) return 3;
        if ($years < 8) return 4;
        return 5;
    }

    private function getExperienceYearsFromLevel($levelId): int
    {
        // هذه دالة وهمية - يجب تعديلها حسب جدول experience_levels الخاص بك
        $levels = [
            1 => 0,  // مبتدئ
            2 => 2,  // متوسط
            3 => 5,  // متقدم
            4 => 8,  // خبير
        ];

        return $levels[$levelId] ?? 0;
    }

    private function isEducationLevelHigher($applicantLevel, $jobLevel): bool
    {
        // هذه دالة وهمية - يجب تعديلها حسب ترتيب المستويات التعليمية
        $levelOrder = [
            1 => 1, // ابتدائي
            2 => 2, // إعدادي
            3 => 3, // ثانوي
            4 => 4, // دبلوم
            5 => 5, // بكالوريوس
            6 => 6, // ماجستير
            7 => 7, // دكتوراه
        ];

        return ($levelOrder[$applicantLevel] ?? 0) > ($levelOrder[$jobLevel] ?? 0);
    }
}
