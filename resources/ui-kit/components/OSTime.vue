<template>
    <div :class="['os-input time', {focus: is_focused}]">
        <label>{{ label }}</label>
        <div class="input" :style="{width: width}">
            <span class="icon"><i class="clock"></i></span>
            <div class="input-parts">
                <div class="hour">
                    <div class="unit">ساعت</div>
                    <input @keypress="onKeypress" type="text" placeholder="۰۰" @focus="onFocus" @blur="onBlur">
                </div>
                <div class="dot">:</div>
                <div class="min">
                    <div class="unit">دقیقه</div>
                    <input @keypress="onKeypress" type="text" placeholder="۰۰" @focus="onFocus" @blur="onBlur">
                </div>
                <div class="dot">:</div>
                <div class="sec">
                    <div class="unit">ثانیه</div>
                    <input @keypress="onKeypress" type="text" placeholder="۰۰" @focus="onFocus" @blur="onBlur">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OSTime",
        props: {
            label: {
                type: String,
            },
            width: {
                type: String,
            },
        },
        data() {
            return {
                is_focused: false,
            }
        },
        methods: {
            onFocus: function() {
                this.is_focused = true;
            },
            onBlur: function() {
                this.is_focused = false;
            },
            onKeypress: function(event) {
                if(!"0123456789".includes(event.key)) {
                    event.preventDefault();
                    return false;
                }

                if(event.target.value.length > 1){
                    event.preventDefault();
                    return false;
                }
            }
        },
    }
</script>

<style scoped>

</style>