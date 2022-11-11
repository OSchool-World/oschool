<template>
    <os-page>
        <os-section class="col-12" caption="سال‌های تحصیلی">
            <os-datagrid :data="academic_years" :columns="datagrid_columns" :row-dropdown-items="datagrid_dropdown_items"></os-datagrid>
        </os-section>
    </os-page>
</template>

<script>
    export default {
        name: "AcademicYears",
        data() {
            return {
                academic_years: [],
                datagrid_columns: {
                    title: 'عنوان',
                    start_at: 'تاریخ شروع',
                    end_at: 'تاریخ پایان',
                    education_system: 'نظام آموزشی'
                },
                datagrid_dropdown_items: [
                    {
                        icon: 'edit',
                        title: 'ویرایش',
                        callback: null
                    },
                    {
                        icon: 'delete',
                        title: 'حذف',
                        callback: null
                    }
                ]
            }
        },
        methods: {
            getAcademicYears() {
                this.axios.get('/education_system/academic_years')
                    .then(response => {
                        this.academic_years = response.data;
                    })
                    .then(error => {
                        console.log(error);
                    });
            }
        },
        created() {
            this.getAcademicYears();
        }
    }
</script>

<style scoped>

</style>
