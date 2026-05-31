<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobTitle;

class JobTitleSeeder extends Seeder
{
    public function run() : void
    {
        $jobTitles = [
            ['nameAr' => 'رئيس مجلس الإدارة', 'name' => 'Chairman'],
            ['nameAr' => 'الرئيس التنفيذي', 'name' => 'Chief Executive Officer (CEO)'],
            ['nameAr' => 'المدير العام', 'name' => 'General Manager'],
            ['nameAr' => 'نائب المدير العام', 'name' => 'Deputy General Manager'],
            ['nameAr' => 'المدير التنفيذي', 'name' => 'Executive Director'],
            ['nameAr' => 'مدير العمليات', 'name' => 'Operations Manager'],
            ['nameAr' => 'مدير الإدارة', 'name' => 'Administration Manager'],
            ['nameAr' => 'مدير مكتب', 'name' => 'Office Manager'],
            ['nameAr' => 'مساعد إداري', 'name' => 'Administrative Assistant'],
            ['nameAr' => 'سكرتير', 'name' => 'SecretnameAry'],
            ['nameAr' => 'سكرتير تنفيذي', 'name' => 'Executive SecretnameAry'],
            ['nameAr' => 'منسق إداري', 'name' => 'Administrative Coordinator'],

            ['nameAr' => 'المدير المالي', 'name' => 'Chief Financial Officer (CFO)'],
            ['nameAr' => 'مدير مالي', 'name' => 'Finance Manager'],
            ['nameAr' => 'محاسب', 'name' => 'Accountant'],
            ['nameAr' => 'محاسب أول', 'name' => 'Senior Accountant'],
            ['nameAr' => 'رئيس حسابات', 'name' => 'Chief Accountant'],
            ['nameAr' => 'مراجع حسابات', 'name' => 'Auditor'],
            ['nameAr' => 'محلل مالي', 'name' => 'Financial Analyst'],
            ['nameAr' => 'أمين صندوق', 'name' => 'Cashier'],
            ['nameAr' => 'محصل', 'name' => 'Collector'],

            ['nameAr' => 'مدير موارد بشرية', 'name' => 'HR Manager'],
            ['nameAr' => 'أخصائي موارد بشرية', 'name' => 'HR Specialist'],
            ['nameAr' => 'مسؤول موارد بشرية', 'name' => 'HR Officer'],
            ['nameAr' => 'أخصائي توظيف', 'name' => 'Recruitment Specialist'],
            ['nameAr' => 'مسؤول شؤون موظفين', 'name' => 'Personnel Officer'],
            ['nameAr' => 'منسق تدريب', 'name' => 'Training Coordinator'],

            ['nameAr' => 'مدير تسويق', 'name' => 'MnameArketing Manager'],
            ['nameAr' => 'أخصائي تسويق', 'name' => 'MnameArketing Specialist'],
            ['nameAr' => 'منسق تسويق', 'name' => 'MnameArketing Coordinator'],
            ['nameAr' => 'مدير العلامة التجارية', 'name' => 'Brand Manager'],
            ['nameAr' => 'مدير تسويق رقمي', 'name' => 'Digital MnameArketing Manager'],
            ['nameAr' => 'أخصائي سوشيال ميديا', 'name' => 'Social Media Specialist'],
            ['nameAr' => 'كاتب محتوى', 'name' => 'Content Writer'],
            ['nameAr' => 'مصمم جرافيك', 'name' => 'Graphic Designer'],
            ['nameAr' => 'مصمم واجهات وتجربة مستخدم', 'name' => 'UI/UX Designer'],

            ['nameAr' => 'مدير مبيعات', 'name' => 'Sales Manager'],
            ['nameAr' => 'مشرف مبيعات', 'name' => 'Sales Supervisor'],
            ['nameAr' => 'مندوب مبيعات', 'name' => 'Sales Representative'],
            ['nameAr' => 'مدير تطوير أعمال', 'name' => 'Business Development Manager'],
            ['nameAr' => 'أخصائي تطوير أعمال', 'name' => 'Business Development Specialist'],
            ['nameAr' => 'مدير علاقات العملاء', 'name' => 'Customer Relationship Manager'],
            ['nameAr' => 'موظف خدمة عملاء', 'name' => 'Customer Service Representative'],
            ['nameAr' => 'موظف استقبال', 'name' => 'Receptionist'],

            ['nameAr' => 'مدير تقنية المعلومات', 'name' => 'IT Manager'],
            ['nameAr' => 'المدير التقني', 'name' => 'Chief Technology Officer (CTO)'],
            ['nameAr' => 'مدير مشاريع تقنية', 'name' => 'IT Project Manager'],
            ['nameAr' => 'محلل نظم', 'name' => 'Systems Analyst'],
            ['nameAr' => 'مهندس برمجيات', 'name' => 'SoftwnameAre Engineer'],
            ['nameAr' => 'مطور برمجيات', 'name' => 'SoftwnameAre Developer'],
            ['nameAr' => 'مطور ويب', 'name' => 'Web Developer'],
            ['nameAr' => 'مطور واجهات أمامية', 'name' => 'Frontend Developer'],
            ['nameAr' => 'مطور واجهات خلفية', 'name' => 'Backend Developer'],
            ['nameAr' => 'مطور تطبيقات جوال', 'name' => 'Mobile Application Developer'],
            ['nameAr' => 'مطور Full Stack', 'name' => 'Full Stack Developer'],
            ['nameAr' => 'مهندس DevOps', 'name' => 'DevOps Engineer'],
            ['nameAr' => 'مهندس سحابة', 'name' => 'Cloud Engineer'],
            ['nameAr' => 'مدير قواعد بيانات', 'name' => 'Database Administrator'],
            ['nameAr' => 'محلل بيانات', 'name' => 'Data Analyst'],
            ['nameAr' => 'عالم بيانات', 'name' => 'Data Scientist'],
            ['nameAr' => 'مهندس ذكاء اصطناعي', 'name' => 'AI Engineer'],
            ['nameAr' => 'أخصائي أمن معلومات', 'name' => 'Information Security Specialist'],
            ['nameAr' => 'مهندس أمن سيبراني', 'name' => 'Cybersecurity Engineer'],
            ['nameAr' => 'مهندس شبكات', 'name' => 'Network Engineer'],
            ['nameAr' => 'فني دعم فني', 'name' => 'Technical Support Specialist'],
            ['nameAr' => 'مدخل بيانات', 'name' => 'Data Entry Clerk'],

            ['nameAr' => 'مدير مشروع', 'name' => 'Project Manager'],
            ['nameAr' => 'منسق مشاريع', 'name' => 'Project Coordinator'],
            ['nameAr' => 'مدير جودة', 'name' => 'Quality Manager'],
            ['nameAr' => 'أخصائي جودة', 'name' => 'Quality Specialist'],
            ['nameAr' => 'مدير مخاطر', 'name' => 'Risk Manager'],

            ['nameAr' => 'مهندس مدني', 'name' => 'Civil Engineer'],
            ['nameAr' => 'مهندس معماري', 'name' => 'nameArchitect'],
            ['nameAr' => 'مهندس إنشائي', 'name' => 'Structural Engineer'],
            ['nameAr' => 'مهندس كهرباء', 'name' => 'Electrical Engineer'],
            ['nameAr' => 'مهندس ميكانيكا', 'name' => 'Mechanical Engineer'],
            ['nameAr' => 'مهندس صناعي', 'name' => 'Industrial Engineer'],
            ['nameAr' => 'مهندس إنتاج', 'name' => 'Production Engineer'],
            ['nameAr' => 'مهندس صيانة', 'name' => 'Maintenance Engineer'],
            ['nameAr' => 'فني كهرباء', 'name' => 'Electrician'],
            ['nameAr' => 'فني ميكانيكا', 'name' => 'Mechanical Technician'],
            ['nameAr' => 'فني صيانة', 'name' => 'Maintenance Technician'],

            ['nameAr' => 'مدير مشتريات', 'name' => 'Procurement Manager'],
            ['nameAr' => 'مسؤول مشتريات', 'name' => 'Procurement Officer'],
            ['nameAr' => 'مدير سلسلة الإمداد', 'name' => 'Supply Chain Manager'],
            ['nameAr' => 'مدير مستودع', 'name' => 'WnameArehouse Manager'],
            ['nameAr' => 'مشرف مستودع', 'name' => 'WnameArehouse Supervisor'],
            ['nameAr' => 'أمين مخزن', 'name' => 'Storekeeper'],
            ['nameAr' => 'منسق لوجستي', 'name' => 'Logistics Coordinator'],
            ['nameAr' => 'مدير نقل', 'name' => 'Transportation Manager'],

            ['nameAr' => 'طبيب', 'name' => 'Doctor'],
            ['nameAr' => 'طبيب عام', 'name' => 'General Practitioner'],
            ['nameAr' => 'طبيب أسنان', 'name' => 'Dentist'],
            ['nameAr' => 'صيدلي', 'name' => 'PhnameArmacist'],
            ['nameAr' => 'ممرض', 'name' => 'Nurse'],
            ['nameAr' => 'أخصائي مختبر', 'name' => 'Laboratory Specialist'],
            ['nameAr' => 'أخصائي أشعة', 'name' => 'Radiologist'],
            ['nameAr' => 'معالج طبيعي', 'name' => 'Physiotherapist'],

            ['nameAr' => 'معلم', 'name' => 'Teacher'],
            ['nameAr' => 'محاضر', 'name' => 'Lecturer'],
            ['nameAr' => 'أستاذ جامعي', 'name' => 'Professor'],
            ['nameAr' => 'باحث', 'name' => 'ResenameArcher'],
            ['nameAr' => 'مشرف أكاديمي', 'name' => 'Academic Supervisor'],

            ['nameAr' => 'محامي', 'name' => 'Lawyer'],
            ['nameAr' => 'مستشار قانوني', 'name' => 'Legal Advisor'],
            ['nameAr' => 'كاتب عدل', 'name' => 'NotnameAry Public'],
            ['nameAr' => 'مسؤول امتثال', 'name' => 'Compliance Officer'],

            ['nameAr' => 'صحفي', 'name' => 'Journalist'],
            ['nameAr' => 'مصور', 'name' => 'Photographer'],
            ['nameAr' => 'محرر', 'name' => 'Editor'],
            ['nameAr' => 'مترجم', 'name' => 'Translator'],

            ['nameAr' => 'سائق', 'name' => 'Driver'],
            ['nameAr' => 'حارس أمن', 'name' => 'Security GunameArd'],
            ['nameAr' => 'مشرف أمن', 'name' => 'Security Supervisor'],
            ['nameAr' => 'عامل', 'name' => 'Worker'],
            ['nameAr' => 'عامل إنتاج', 'name' => 'Production Worker'],
            ['nameAr' => 'مشرف إنتاج', 'name' => 'Production Supervisor'],
        ];

        foreach ($jobTitles as $jobTitle) {
            JobTitle::create([
                'name' => $jobTitle['name'],
                'nameAr' => $jobTitle['nameAr'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}