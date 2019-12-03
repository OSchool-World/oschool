<template>
    <os-page>
        <os-section class="col-9">
            <os-datagrid :data="users" :columns="users_table_columns" :row-dropdown-items="users_table_dropdown_items"></os-datagrid>
        </os-section>
        <os-section class="col-3">
            <router-link tag="button" class="os-btn col-12" :to="{name: 'user_management.user_wizard'}">افزودن کاربر جدید</router-link>
            <os-listbox multiple label="نوع کاربر" :items="user_types" ></os-listbox>
        </os-section>
    </os-page>
</template>

<script>
    export default {
        data() {
            return {
                users: [
                    {
                        name: "root",
                        user_name: 'root',
                        email: 'root@oschool.com',
                        types: ['owner'],
                    },
                    {
                        name: "administrator",
                        user_name: 'admin',
                        email: 'admin@oschool.com',
                        types: ['admin'],
                    },
                    {
                        name: "ali",
                        user_name: 'ali',
                        email: 'ali@oschool.com',
                        types: ['student'],
                    }
                ],
                users_table_columns: {
                    name: "نام",
                    user_name: "نام کاربری",
                    email: 'ایمیل',
                    types: 'نوع کاربر',
                    roles: 'نقش‌ها',
                },
                users_table_dropdown_items: [
                    {
                        icon: 'edit',
                        title: 'ویرایش',
                        callback: this.editUser
                    },
                    {
                        icon: 'delete',
                        title: 'حذف',
                        callback: this.deleteUser
                    }
                ],
                user_types: [
                    {
                        value: 'all',
                        text: 'همه'
                    },
                    {
                        value: 'owner',
                        text: 'صاحب سیستم'
                    },
                    {
                        value: 'admin',
                        text: 'ادمین'
                    },
                    {
                        value: 'employee',
                        text: 'کارمند'
                    },
                    {
                        value: 'student',
                        text: 'دانش‌آموز'
                    },
                    {
                        value: 'parent',
                        text: 'والدین'
                    },
                ]
            }
        },
        methods: {
            deleteUser(user) {

            },
            editUser(user) {

            }
        },
    }
</script>

<style scoped>

</style>