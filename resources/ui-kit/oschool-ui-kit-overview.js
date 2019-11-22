import Vue from 'vue';
import OSchoolUIKit from './index';

Vue.use(OSchoolUIKit);

class LanguageManager {
    static convertAllDigitsToPersian(str) {
        const digit_dict = {
            "0": "۰",
            "1": "۱",
            "2": "۲",
            "3": "۳",
            "4": "۴",
            "5": "۵",
            "6": "۶",
            "7": "۷",
            "8": "۸",
            "9": "۹",
        };

        var regx = new RegExp(Object.keys(digit_dict).join("|"), "gi");
        return str.replace(regx, function (matched) {
            return digit_dict[matched];
        });
    }
}

const NotificationManager = {
    notifications: [],

    notify: function (text, type, time=2000) {

        var notif = {
            text: text,
            type: type
        };

        NotificationManager.notifications.push(notif);

        setTimeout(() => {
            index = NotificationManager.notifications.indexOf(notif);
            NotificationManager.notifications.splice(index, 1);
        }, time);
    }
};

let app = new Vue({
    el: "#app",
    data: {
        is_collapsed_nav: false,
        LanguageManager: LanguageManager,
        NotificationManager: NotificationManager,

        students: [
            {
                id: 1,
                first_name: "علی",
                last_name: "محمدی",
                phone: "0213333333"
            },
            {
                id: 2,
                first_name: "کریم",
                last_name: "متقیانی",
                phone: "0213333333"
            },
            {
                id: 3,
                first_name: "محمد رضا",
                last_name: "زارع زاده",
                phone: "0213333333"
            },
            {
                id: 4,
                first_name: "نوید",
                last_name: "هاشمی نوین",
                phone: "0213333333"
            },
        ],
        students_table_row_dropdown_items: [
            {
                icon: "delete",
                title: "حذف",
                callback: null
            },
            {
                icon: "edit",
                title: "ویرایش",
                callback: null
            },
        ],
        students_table_columns: {
            "id": "کد",
            "first_name": "نام",
            "last_name": "نام خانوادگی",
            "phone": "تلفن"
        },
        grades: [
            {
                text: "پایه اول"
            },
            {
                text: "پایه دوم"
            },
            {
                text: "پایه سوم"
            },
            {
                text: "پایه چهارم"
            },
            {
                text: "پایه پنجم"
            },
            {
                text: "پایه ششم"
            },
            {
                text: "پایه هفتم"
            },
            {
                text: "پایه هشتم"
            },
            {
                text: "پایه نهم"
            },
            {
                text: "پایه دهم"
            },
            {
                text: "پایه یازدهم"
            },
            {
                text: "پایه دوازدهم"
            },
        ],
        nav_items: [
            {
                "title": "آموزشی",
                "icon": "educational",
                "sub_list": [
                    {
                        "title": "دروس و کلاس‌ها",
                        "icon": "س",
                        "sub_list": [
                            {
                                "title": "عمومی",
                                "sub_list": [
                                    {
                                        "title": "درس جدید",
                                        "icon": "",
                                        "sub_list": []
                                    },
                                    {
                                        "title": "کلاسها",
                                        "icon": "",
                                        "sub_list": []
                                    },
                                    {
                                        "title": "کلاس بندی دانش‌آموزان",
                                        "icon": "",
                                        "sub_list": []
                                    },
                                ]
                            },
                            {
                                "title": "گزارش‌ها",
                                "sub_list": [
                                    {
                                        "title": "برنامه هفتگی",
                                        "icon": "",
                                        "sub_list": []
                                    },
                                    {
                                        "title": "لیست کلاسی",
                                        "icon": "",
                                        "sub_list": []
                                    },
                                ]
                            },
                        ]
                    },
                    {
                        "title": "آزمون‌ها",
                        "icon": "آ",
                        "sub_list": []
                    },
                    {
                        "title": "نمره و کارنامه",
                        "icon": "ن",
                        "sub_list": []
                    },
                    {
                        "title": "تکالیف",
                        "icon": "ک",
                        "sub_list": []
                    },
                    {
                        "title": "منابع درسی",
                        "icon": "م",
                        "sub_list": []
                    },
                    {
                        "title": "بانک سؤال",
                        "icon": "ب",
                        "sub_list": []
                    },
                    {
                        "title": "طرح درس‌ها",
                        "icon": "ط",
                        "sub_list": []
                    },
                    {
                        "title": "دفتر کلاسی",
                        "icon": "د",
                        "sub_list": []
                    },
                ]
            },
            {
                "title": "تربیتی",
                "icon": "cultural",
                "sub_list": [
                    {
                        "title": "مشاوره",
                        "icon": "م",
                        "sub_list": []
                    },
                    {
                        "title": "قرار ملاقات",
                        "icon": "ق",
                        "sub_list": []
                    },
                    {
                        "title": "تست‌های روانشناسی",
                        "icon": "ت",
                        "sub_list": []
                    },
                    {
                        "title": "پرونده دوره",
                        "icon": "پ",
                        "sub_list": []
                    },
                    {
                        "title": "مراسم و جلسات",
                        "icon": "ج",
                        "sub_list": []
                    },
                    {
                        "title": "موارد انضباطی",
                        "icon": "ض",
                        "sub_list": []
                    },
                    {
                        "title": "اردوها",
                        "icon": "ا",
                        "sub_list": []
                    },
                ]
            },
            {
                "title": "مالی - اداری",
                "icon": "official",
                "sub_list": [
                    {
                        "title": "شهریه",
                        "icon": "ش",
                        "sub_list": []
                    },
                    {
                        "title": "حسابداری",
                        "icon": "ح",
                        "sub_list": []
                    },
                    {
                        "title": "آیین‌نامه‌ها",
                        "icon": "آ",
                        "sub_list": []
                    },
                ]
            },
            {
                "title": "اطلاع‌رسانی",
                "icon": "communication",
                "sub_list": [
                    {
                        "title": "وب‌سایت عمومی",
                        "icon": "س",
                        "sub_list": []
                    },
                    {
                        "title": "پیام‌رسان",
                        "icon": "پ",
                        "sub_list": []
                    },
                    {
                        "title": "گالری و آرشیو",
                        "icon": "گ",
                        "sub_list": []
                    },
                    {
                        "title": "تالار گفتگو",
                        "icon": "ت",
                        "sub_list": []
                    },
                    {
                        "title": "مدیریت پیامک",
                        "icon": "م",
                        "sub_list": []
                    },
                    {
                        "title": "ثبت نام",
                        "icon": "ث",
                        "sub_list": []
                    },
                ]
            },
            {
                "title": "خدمات",
                "icon": "services",
                "sub_list": [
                    {
                        "title": "روابط عمومی",
                        "icon": "ر",
                        "sub_list": []
                    },
                    {
                        "title": "تغذیه و بوفه",
                        "icon": "غ",
                        "sub_list": []
                    },
                    {
                        "title": "انتشارات",
                        "icon": "ش",
                        "sub_list": []
                    },
                    {
                        "title": "کتابخانه",
                        "icon": "ک",
                        "sub_list": []
                    },
                    {
                        "title": "اماکن و ورزشگاه",
                        "icon": "ا",
                        "sub_list": []
                    },
                    {
                        "title": "امور اجرایی",
                        "icon": "ج",
                        "sub_list": []
                    },
                    {
                        "title": "حمل و نقل",
                        "icon": "ح",
                        "sub_list": []
                    },
                ]
            },
            {
                "title": "منابع انسانی",
                "icon": "human_resource",
                "sub_list": [
                    {
                        "title": "مدیریت کارمندان",
                        "icon": "ک",
                        "sub_list": []
                    },
                    {
                        "title": "پرونده‌ی سلامت",
                        "icon": "س",
                        "sub_list": []
                    },
                    {
                        "title": "حضور و غیاب",
                        "icon": "غ",
                        "sub_list": []
                    },
                    {
                        "title": "ارزیابی / نظرسنجی",
                        "icon": "ا",
                        "sub_list": []
                    },
                    {
                        "title": "مدیریت وظایف",
                        "icon": "ظ",
                        "sub_list": []
                    },
                    {
                        "title": "دپارتمان‌ها",
                        "icon": "د",
                        "sub_list": []
                    },
                    {
                        "title": "شوراها",
                        "icon": "ش",
                        "sub_list": []
                    },
                    {
                        "title": "مدیریت دستمزد",
                        "icon": "س",
                        "sub_list": []
                    },
                ]
            },
            {
                "title": "زیرساخت",
                "icon": "substructure",
                "sub_list": [
                    {
                        "title": "پیکربندی",
                        "icon": "پ",
                        "sub_list": []
                    },
                    {
                        "title": "نظام آموزشی",
                        "icon": "ظ",
                        "sub_list": [
                            {
                                "title": "",
                                "sub_list": [
                                    {
                                        "title": "نظام‌های آموزشی",
                                        "icon": "",
                                    },
                                    {
                                        "title": "سال‌های تحصیلی",
                                        "icon": "",
                                    },
                                    {
                                        "title": "شعب موسسه",
                                        "icon": "",
                                    },
                                ]
                            },
                        ]
                    },
                    {
                        "title": "مدیریت کاربران",
                        "icon": "ک",
                        "sub_list": [
                            {
                                "title": "",
                                "sub_list": [
                                    {
                                        "title": "نقش‌ها",
                                        "icon": "",
                                    },
                                    {
                                        "title": "کاربران",
                                        "icon": "",
                                    },
                                    {
                                        "title": "افزودن کاربر جدید",
                                        "icon": "",
                                    },
                                ]
                            },
                        ]
                    },
                    {
                        "title": "مدیریت دانش‌آموزان",
                        "icon": "ش",
                        "sub_list": []
                    },
                    {
                        "title": "مکان‌های مدرسه",
                        "icon": "م",
                        "sub_list": []
                    },
                    {
                        "title": "تقویم و رویداد",
                        "icon": "ق",
                        "sub_list": []
                    },
                ]
            },
        ],
        grade_groups: [
            {
                text: "مقطع ابتدایی"
            },
            {
                text: "مقطع متوسطه اول"
            },
            {
                text: "مقطع متوسطه دوم"
            },
            {
                text: "رشته انسانی"
            },
            {
                text: "رشته ریاضی - فیزیک"
            },
            {
                text: "رشته تجربی"
            },
            {
                text: "هنرستان"
            },
        ]
    },
});