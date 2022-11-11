<template>
    <os-page>
        <os-section class="col-12" caption="افزودن سال تحصیلی جدید">
            <os-step :step="step">
                <os-step-page title="مشخصات سال تحصیلی">
                    <div class="row">
                        <div class="col-5">
                            <os-input label="عنوان سال تحصیلی"></os-input>
                            <os-date label="تاریخ شروع"></os-date>
                            <os-date label="تاریخ پایان"></os-date>
                            <br>
                            <button class="os-btn" @click="step=2">مرحله بعد >></button>
                        </div>
                    </div>
                </os-step-page>

                <os-step-page title="نظام آموزشی">
                    <div class="row">
                        <div class="col-5">
                            <os-select label="نظام آموزشی"></os-select>
                            <os-listbox label="پایه‌های فعال"></os-listbox>
                            <br>
                            <button class="os-btn" @click="step=3">مرحله بعد >></button>
                        </div>
                    </div>
                </os-step-page>

                <os-step-page title="کلاس‌ها / شعبه‌ها">
                    <div class="row">
                        <div class="col-7">

                        </div>
                    </div>
                </os-step-page>
            </os-step>
        </os-section>
    </os-page>
</template>

<script>
    export default {
        name: "AcademicYear",
        data() {
            return {
                step: 1
            }
        },
    }
</script>

<style scoped>

</style>
