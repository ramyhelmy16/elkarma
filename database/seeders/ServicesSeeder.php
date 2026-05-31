<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    public function run() : void
    {
        $types = [
            ['name' => 'تكنولوجيا المعلومات', 'name_en' => 'Information Technology'],
            ['name' => 'البرمجيات', 'name_en' => 'Software Development'],
            ['name' => 'الاتصالات', 'name_en' => 'Telecommunications'],
            ['name' => 'الذكاء الاصطناعي', 'name_en' => 'Artificial Intelligence'],
            ['name' => 'الأمن السيبراني', 'name_en' => 'Cybersecurity'],
            ['name' => 'تطوير البرمجيات', 'name_en' => 'Software Development'],
            ['name' => 'تصميم المواقع', 'name_en' => 'Web Design'],
            ['name' => 'تطوير تطبيقات الجوال', 'name_en' => 'Mobile App Development'],
            ['name' => 'البنوك', 'name_en' => 'Banking'],
            ['name' => 'الخدمات المالية', 'name_en' => 'Financial Services'],
            ['name' => 'التأمين', 'name_en' => 'Insurance'],
            ['name' => 'الاستثمار', 'name_en' => 'Investment Management'],
            ['name' => 'الاستشارات الإدارية', 'name_en' => 'Management Consulting'],
            ['name' => 'الاستشارات التقنية', 'name_en' => 'IT Consulting'],
            ['name' => 'التسويق الرقمي', 'name_en' => 'Digital Marketing'],
            ['name' => 'إدارة وسائل التواصل الاجتماعي', 'name_en' => 'Social Media Management'],
            ['name' => 'التكنولوجيا المالية', 'name_en' => 'FinTech'],
            ['name' => 'المحاسبة', 'name_en' => 'Accounting Services'],
            ['name' => 'التدقيق المالي', 'name_en' => 'Audit Services'],
            ['name' => 'الرعاية الصحية', 'name_en' => 'Healthcare'],
            ['name' => 'المستشفيات', 'name_en' => 'Hospitals'],
            ['name' => 'الصيدلة', 'name_en' => 'Pharmaceuticals'],
            ['name' => 'الأجهزة الطبية', 'name_en' => 'Medical Devices'],
            ['name' => 'المختبرات الطبية', 'name_en' => 'Medical Laboratories'],
            ['name' => 'التعليم', 'name_en' => 'Education'],
            ['name' => 'التدريب', 'name_en' => 'Training'],
            ['name' => 'البحث العلمي', 'name_en' => 'Research'],
            ['name' => 'التصنيع', 'name_en' => 'Manufacturing'],
            ['name' => 'الصناعات الثقيلة', 'name_en' => 'Heavy Industry'],
            ['name' => 'الصناعات الغذائية', 'name_en' => 'Food Manufacturing'],
            ['name' => 'الصناعات الدوائية', 'name_en' => 'Pharmaceutical Manufacturing'],
            ['name' => 'صناعة السيارات', 'name_en' => 'Automotive Industry'],
            ['name' => 'صناعة النسيج', 'name_en' => 'Textile Industry'],
            ['name' => 'الإنشاءات', 'name_en' => 'Construction'],
            ['name' => 'المقاولات', 'name_en' => 'Contracting'],
            ['name' => 'العقارات', 'name_en' => 'Real Estate'],
            ['name' => 'التطوير العقاري', 'name_en' => 'Real Estate Development'],
            ['name' => 'إدارة المرافق', 'name_en' => 'Facilities Management'],
            ['name' => 'التجارة', 'name_en' => 'Trading'],
            ['name' => 'التجزئة', 'name_en' => 'Retail'],
            ['name' => 'الجملة', 'name_en' => 'Wholesale'],
            ['name' => 'التجارة الإلكترونية', 'name_en' => 'E-Commerce'],
            ['name' => 'النقل', 'name_en' => 'Transportation'],
            ['name' => 'الخدمات اللوجستية', 'name_en' => 'Logistics'],
            ['name' => 'الشحن', 'name_en' => 'Shipping'],
            ['name' => 'الطيران', 'name_en' => 'Aviation'],
            ['name' => 'السكك الحديدية', 'name_en' => 'Railways'],
            ['name' => 'السياحة', 'name_en' => 'Tourism'],
            ['name' => 'الضيافة', 'name_en' => 'Hospitality'],
            ['name' => 'الفنادق', 'name_en' => 'Hotels'],
            ['name' => 'المطاعم', 'name_en' => 'Restaurants'],
            ['name' => 'الترفيه', 'name_en' => 'Entertainment'],
            ['name' => 'الطاقة', 'name_en' => 'Energy'],
            ['name' => 'النفط والغاز', 'name_en' => 'Oil & Gas'],
            ['name' => 'الطاقة المتجددة', 'name_en' => 'Renewable Energy'],
            ['name' => 'الكهرباء', 'name_en' => 'Electric Utilities'],
            ['name' => 'الزراعة', 'name_en' => 'Agriculture'],
            ['name' => 'الثروة الحيوانية', 'name_en' => 'Livestock'],
            ['name' => 'الثروة السمكية', 'name_en' => 'Fisheries'],
            ['name' => 'الإعلام', 'name_en' => 'Media'],
            ['name' => 'النشر', 'name_en' => 'Publishing'],
            ['name' => 'الإعلان', 'name_en' => 'Advertising'],
            ['name' => 'التسويق', 'name_en' => 'Marketing'],
            ['name' => 'الخدمات القانونية', 'name_en' => 'Legal Services'],
            ['name' => 'الاستشارات', 'name_en' => 'Consulting'],
            ['name' => 'المحاسبة والتدقيق', 'name_en' => 'Accounting & Auditing'],
            ['name' => 'القطاع الحكومي', 'name_en' => 'Government'],
            ['name' => 'القطاع غير الربحي', 'name_en' => 'Non-Profit Organizations'],
            ['name' => 'المنظمات الدولية', 'name_en' => 'International Organizations'],
            ['name' => 'خدمات التنظيف', 'name_en' => 'Cleaning Services'],
            ['name' => 'خدمات الصيانة', 'name_en' => 'Maintenance Services'],
            ['name' => 'التعدين', 'name_en' => 'Mining'],
            ['name' => 'الكيماويات', 'name_en' => 'Chemicals'],
            ['name' => 'البتروكيماويات', 'name_en' => 'Petrochemicals'],
            ['name' => 'البيئة وإدارة النفايات', 'name_en' => 'Environmental Services'],
            ['name' => 'خدمات التوظيف', 'name_en' => 'Recruitment Services'],
            ['name' => 'الترجمة', 'name_en' => 'Translation Services'],
            ['name' => 'النقل والشحن', 'name_en' => 'Transportation & Shipping'],
            ['name' => 'الصيانة', 'name_en' => 'Maintenance Services'],
            ['name' => 'الأمن والحراسة', 'name_en' => 'Security Services'],
            ['name' => 'خدمات النظافة', 'name_en' => 'Cleaning Services'],
        ];

        foreach ($types as $type) {
            Service::create([
                'name' => $type['name'],
                'name_en' => $type['name_en'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}