<?php

namespace App\Filament\Actions;

use App\Models\JobTitle;
use Filament\Actions\Action;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class SafeDeleteJobTitleAction
{
    public static function make(): Action
    {
        return Action::make('safeDeleteJobTitle')
            ->label('حذف')
            ->icon('heroicon-o-trash')
            ->color('danger')
            ->requiresConfirmation()
            ->modalHeading('تأكيد حذف الوظيفة')
            ->modalWidth('lg')
            ->action(function (JobTitle $record, array $data) {
                $hasRelations = $record->workExperiences()->exists() ||
                    $record->occupations()->exists();

                if ($hasRelations) {
                    if (isset($data['replacement_job_title_id']) && $data['replacement_job_title_id']) {
                        $replacement = JobTitle::findOrFail($data['replacement_job_title_id']);

                        DB::transaction(function () use ($record, $replacement) {
                            $record->workExperiences()->update(['job_title_id' => $replacement->id]);
                            $record->occupations()->update(['job_title_id' => $replacement->id]);
                            $record->delete();
                        });

                        Notification::make()
                            ->title('تم الحذف بنجاح')
                            ->body('تم نقل جميع البيانات إلى "' . $replacement->name . '"')
                            ->success()
                            ->send();
                        redirect()->to(route('filament.admin.resources.job-titles.index'));
                    } else {
                        Notification::make()
                            ->title('خطأ')
                            ->body('يجب اختيار وظيفة بديلة')
                            ->danger()
                            ->send();
                        return;
                    }
                } else {
                    $record->delete();

                    Notification::make()
                        ->title('تم الحذف')
                        ->body('تم حذف الوظيفة بنجاح')
                        ->success()
                        ->send();
                    redirect()->to(route('filament.admin.resources.job-titles.index'));
                }
            })
            ->form(function (JobTitle $record) {
                $workExperiencesCount = $record->workExperiences()->count();
                $occupationsCount = $record->occupations()->count();
                $hasRelations = $workExperiencesCount > 0 || $occupationsCount > 0;

                $formSchema = [];

                if ($hasRelations) {
                    $formSchema[] = Placeholder::make('warning')
                        ->content('⚠️ هذه الوظيفة مرتبطة بالبيانات التالية:')
                        ->columnSpanFull();

                    if ($workExperiencesCount > 0) {
                        $formSchema[] = Placeholder::make('work_experiences')
                            ->content("📋 {$workExperiencesCount} خبرة عمل")
                            ->columnSpanFull();
                    }

                    if ($occupationsCount > 0) {
                        $formSchema[] = Placeholder::make('occupations')
                            ->content("💼 {$occupationsCount} وظيفة مفتوحة")
                            ->columnSpanFull();
                    }

                    $formSchema[] = Placeholder::make('instruction')
                        ->content('لحذف هذه الوظيفة، يجب اختيار وظيفة بديلة:')
                        ->columnSpanFull();

                    $formSchema[] = Select::make('replacement_job_title_id')
                        ->label('الوظيفة البديلة')
                        ->options(JobTitle::where('id', '!=', $record->id)->pluck('name', 'id'))
                        ->searchable()
                        ->required()
                        ->placeholder('اختر وظيفة بديلة')
                        ->helperText('سيتم نقل جميع البيانات المرتبطة إلى الوظيفة الجديدة.');
                } else {
                    $formSchema[] = Placeholder::make('safe_to_delete')
                        ->content('✓ هذه الوظيفة غير مرتبطة بأي بيانات. يمكن حذفها بأمان.')
                        ->columnSpanFull();
                }

                return $formSchema;
            })
            ->modalSubmitActionLabel('حذف')
            ->modalCancelActionLabel('إلغاء');
    }
}
