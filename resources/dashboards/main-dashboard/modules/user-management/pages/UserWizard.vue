<template>
    <os-page>
        <os-section class="col-12" caption="افزودن کاربر جدید">
            <os-step :step="step">
                <os-step-page title="مشخصات کاربری" class="col-4">
                    <os-input label="نام"></os-input>
                    <os-input label="نام کاربری"></os-input>
                    <os-input label="ایمیل"></os-input>
                    <br>
                    <button class="os-btn" @click="step = 2">مرحله بعد</button>
                </os-step-page>

                <os-step-page title="رمز عبور" class="col-4">
                    <os-input type="password" label="رمز عبور"></os-input>
                    <os-input type="password" label="تکرار رمز عبور"></os-input>
                    <br>
                    <button class="os-btn" @click="step = 3">مرحله بعد</button>
                </os-step-page>

                <os-step-page title="نوع کاربر">

                </os-step-page>

                <os-step-page title="نقش‌ها">

                </os-step-page>
            </os-step>
        </os-section>
    </os-page>
</template>

<script>
    export default {
        name: "UserWizard",
        data() {
            return {
                step: 1,
            }
        },
        methods: {

        },
    }
</script>

<style scoped>

</style>
