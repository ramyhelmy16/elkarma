<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobTitle;

class JobTitleSeeder extends Seeder
{
    public function run() : void
    {
        $jobTitles = [
            ['name' => 'رئيس مجلس الإدارة', 'name_en' => 'Chairman'],
            ['name' => 'الرئيس التنفيذي', 'name_en' => 'Chief Executive Officer (CEO)'],
            ['name' => 'المدير العام', 'name_en' => 'General Manager'],
            ['name' => 'نائب المدير العام', 'name_en' => 'Deputy General Manager'],
            ['name' => 'المدير التنفيذي', 'name_en' => 'Executive Director'],
            ['name' => 'مدير العمليات', 'name_en' => 'Operations Manager'],
            ['name' => 'مدير الإدارة', 'name_en' => 'Administration Manager'],
            ['name' => 'مدير مكتب', 'name_en' => 'Office Manager'],
            ['name' => 'مساعد إداري', 'name_en' => 'Administrative Assistant'],
            ['name' => 'سكرتير', 'name_en' => 'SecretnameAry'],
            ['name' => 'سكرتير تنفيذي', 'name_en' => 'Executive SecretnameAry'],
            ['name' => 'منسق إداري', 'name_en' => 'Administrative Coordinator'],

            ['name' => 'المدير المالي', 'name_en' => 'Chief Financial Officer (CFO)'],
            ['name' => 'مدير مالي', 'name_en' => 'Finance Manager'],
            ['name' => 'محاسب', 'name_en' => 'Accountant'],
            ['name' => 'محاسب أول', 'name_en' => 'Senior Accountant'],
            ['name' => 'رئيس حسابات', 'name_en' => 'Chief Accountant'],
            ['name' => 'مراجع حسابات', 'name_en' => 'Auditor'],
            ['name' => 'محلل مالي', 'name_en' => 'Financial Analyst'],
            ['name' => 'أمين صندوق', 'name_en' => 'Cashier'],
            ['name' => 'محصل', 'name_en' => 'Collector'],

            ['name' => 'مدير موارد بشرية', 'name_en' => 'HR Manager'],
            ['name' => 'أخصائي موارد بشرية', 'name_en' => 'HR Specialist'],
            ['name' => 'مسؤول موارد بشرية', 'name_en' => 'HR Officer'],
            ['name' => 'أخصائي توظيف', 'name_en' => 'Recruitment Specialist'],
            ['name' => 'مسؤول شؤون موظفين', 'name_en' => 'Personnel Officer'],
            ['name' => 'منسق تدريب', 'name_en' => 'Training Coordinator'],

            ['name' => 'مدير تسويق', 'name_en' => 'MnameArketing Manager'],
            ['name' => 'أخصائي تسويق', 'name_en' => 'MnameArketing Specialist'],
            ['name' => 'منسق تسويق', 'name_en' => 'MnameArketing Coordinator'],
            ['name' => 'مدير العلامة التجارية', 'name_en' => 'Brand Manager'],
            ['name' => 'مدير تسويق رقمي', 'name_en' => 'Digital MnameArketing Manager'],
            ['name' => 'أخصائي سوشيال ميديا', 'name_en' => 'Social Media Specialist'],
            ['name' => 'كاتب محتوى', 'name_en' => 'Content Writer'],
            ['name' => 'مصمم جرافيك', 'name_en' => 'Graphic Designer'],
            ['name' => 'مصمم واجهات وتجربة مستخدم', 'name_en' => 'UI/UX Designer'],

            ['name' => 'مدير مبيعات', 'name_en' => 'Sales Manager'],
            ['name' => 'مشرف مبيعات', 'name_en' => 'Sales Supervisor'],
            ['name' => 'مندوب مبيعات', 'name_en' => 'Sales Representative'],
            ['name' => 'مدير تطوير أعمال', 'name_en' => 'Business Development Manager'],
            ['name' => 'أخصائي تطوير أعمال', 'name_en' => 'Business Development Specialist'],
            ['name' => 'مدير علاقات العملاء', 'name_en' => 'Customer Relationship Manager'],
            ['name' => 'موظف خدمة عملاء', 'name_en' => 'Customer Service Representative'],
            ['name' => 'موظف استقبال', 'name_en' => 'Receptionist'],

            ['name' => 'مدير تقنية المعلومات', 'name_en' => 'IT Manager'],
            ['name' => 'المدير التقني', 'name_en' => 'Chief Technology Officer (CTO)'],
            ['name' => 'مدير مشاريع تقنية', 'name_en' => 'IT Project Manager'],
            ['name' => 'محلل نظم', 'name_en' => 'Systems Analyst'],
            ['name' => 'مهندس برمجيات', 'name_en' => 'SoftwnameAre Engineer'],
            ['name' => 'مطور برمجيات', 'name_en' => 'SoftwnameAre Developer'],
            ['name' => 'مطور ويب', 'name_en' => 'Web Developer'],
            ['name' => 'مطور واجهات أمامية', 'name_en' => 'Frontend Developer'],
            ['name' => 'مطور واجهات خلفية', 'name_en' => 'Backend Developer'],
            ['name' => 'مطور تطبيقات جوال', 'name_en' => 'Mobile Application Developer'],
            ['name' => 'مطور Full Stack', 'name_en' => 'Full Stack Developer'],
            ['name' => 'مهندس DevOps', 'name_en' => 'DevOps Engineer'],
            ['name' => 'مهندس سحابة', 'name_en' => 'Cloud Engineer'],
            ['name' => 'مدير قواعد بيانات', 'name_en' => 'Database Administrator'],
            ['name' => 'محلل بيانات', 'name_en' => 'Data Analyst'],
            ['name' => 'عالم بيانات', 'name_en' => 'Data Scientist'],
            ['name' => 'مهندس ذكاء اصطناعي', 'name_en' => 'AI Engineer'],
            ['name' => 'أخصائي أمن معلومات', 'name_en' => 'Information Security Specialist'],
            ['name' => 'مهندس أمن سيبراني', 'name_en' => 'Cybersecurity Engineer'],
            ['name' => 'مهندس شبكات', 'name_en' => 'Network Engineer'],
            ['name' => 'فني دعم فني', 'name_en' => 'Technical Support Specialist'],
            ['name' => 'مدخل بيانات', 'name_en' => 'Data Entry Clerk'],

            ['name' => 'مدير مشروع', 'name_en' => 'Project Manager'],
            ['name' => 'منسق مشاريع', 'name_en' => 'Project Coordinator'],
            ['name' => 'مدير جودة', 'name_en' => 'Quality Manager'],
            ['name' => 'أخصائي جودة', 'name_en' => 'Quality Specialist'],
            ['name' => 'مدير مخاطر', 'name_en' => 'Risk Manager'],

            ['name' => 'مهندس مدني', 'name_en' => 'Civil Engineer'],
            ['name' => 'مهندس معماري', 'name_en' => 'nameArchitect'],
            ['name' => 'مهندس إنشائي', 'name_en' => 'Structural Engineer'],
            ['name' => 'مهندس كهرباء', 'name_en' => 'Electrical Engineer'],
            ['name' => 'مهندس ميكانيكا', 'name_en' => 'Mechanical Engineer'],
            ['name' => 'مهندس صناعي', 'name_en' => 'Industrial Engineer'],
            ['name' => 'مهندس إنتاج', 'name_en' => 'Production Engineer'],
            ['name' => 'مهندس صيانة', 'name_en' => 'Maintenance Engineer'],
            ['name' => 'فني كهرباء', 'name_en' => 'Electrician'],
            ['name' => 'فني ميكانيكا', 'name_en' => 'Mechanical Technician'],
            ['name' => 'فني صيانة', 'name_en' => 'Maintenance Technician'],

            ['name' => 'مدير مشتريات', 'name_en' => 'Procurement Manager'],
            ['name' => 'مسؤول مشتريات', 'name_en' => 'Procurement Officer'],
            ['name' => 'مدير سلسلة الإمداد', 'name_en' => 'Supply Chain Manager'],
            ['name' => 'مدير مستودع', 'name_en' => 'WnameArehouse Manager'],
            ['name' => 'مشرف مستودع', 'name_en' => 'WnameArehouse Supervisor'],
            ['name' => 'أمين مخزن', 'name_en' => 'Storekeeper'],
            ['name' => 'منسق لوجستي', 'name_en' => 'Logistics Coordinator'],
            ['name' => 'مدير نقل', 'name_en' => 'Transportation Manager'],

            ['name' => 'طبيب', 'name_en' => 'Doctor'],
            ['name' => 'طبيب عام', 'name_en' => 'General Practitioner'],
            ['name' => 'طبيب أسنان', 'name_en' => 'Dentist'],
            ['name' => 'صيدلي', 'name_en' => 'PhnameArmacist'],
            ['name' => 'ممرض', 'name_en' => 'Nurse'],
            ['name' => 'أخصائي مختبر', 'name_en' => 'Laboratory Specialist'],
            ['name' => 'أخصائي أشعة', 'name_en' => 'Radiologist'],
            ['name' => 'معالج طبيعي', 'name_en' => 'Physiotherapist'],

            ['name' => 'معلم', 'name_en' => 'Teacher'],
            ['name' => 'محاضر', 'name_en' => 'Lecturer'],
            ['name' => 'أستاذ جامعي', 'name_en' => 'Professor'],
            ['name' => 'باحث', 'name_en' => 'ResenameArcher'],
            ['name' => 'مشرف أكاديمي', 'name_en' => 'Academic Supervisor'],

            ['name' => 'محامي', 'name_en' => 'Lawyer'],
            ['name' => 'مستشار قانوني', 'name_en' => 'Legal Advisor'],
            ['name' => 'كاتب عدل', 'name_en' => 'NotnameAry Public'],
            ['name' => 'مسؤول امتثال', 'name_en' => 'Compliance Officer'],

            ['name' => 'صحفي', 'name_en' => 'Journalist'],
            ['name' => 'مصور', 'name_en' => 'Photographer'],
            ['name' => 'محرر', 'name_en' => 'Editor'],
            ['name' => 'مترجم', 'name_en' => 'Translator'],

            ['name' => 'سائق', 'name_en' => 'Driver'],
            ['name' => 'حارس أمن', 'name_en' => 'Security GunameArd'],
            ['name' => 'مشرف أمن', 'name_en' => 'Security Supervisor'],
            ['name' => 'عامل', 'name_en' => 'Worker'],
            ['name' => 'عامل إنتاج', 'name_en' => 'Production Worker'],
            ['name' => 'مشرف إنتاج', 'name_en' => 'Production Supervisor'],
        ];

        foreach ($jobTitles as $jobTitle) {
            JobTitle::create([
                'name' => $jobTitle['name'],
                'name_en' => $jobTitle['name_en'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}