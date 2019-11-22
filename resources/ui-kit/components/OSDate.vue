<template>
    <div :class="['os-input', {focus: is_focused}]" ref="root">
        <label>{{ label }}</label>
        <div class="input" :style="{width: width}">
            <span class="icon selectable" v-closable="{exclude: ['root'], handler: 'onOutsideClick'}" @click="onIconClick"><i class="calendar"></i></span>
            <input ref="main_input" @keypress="onKeypress" type="text" :placeholder="label" @focus="onFocus">
        </div>
        <div class="menu date" v-if="show_menu">
            <div class="controls">
                <div class="right">
                    <span class="btn">دیروز</span>
                    <span class="btn active">امروز</span>
                    <span class="btn">فردا</span>
                </div>

                <div class="next-year" title="سال بعد"><i class="right-arrow2"></i></div>
                <div class="next-month" title="ماه بعد"><i class="right-arrow"></i></div>

                <div class="center">
                    <div class="jalai">۳۰ خرداد ۱۳۹۸</div>
                    <div class="gregorian">20 Jun 2019</div>
                    <div class="hijri">۱۶ شوال ۱۴۴۰</div>
                </div>

                <div class="pre-month" title="ماه قبل"><i class="left-arrow"></i></div>
                <div class="pre-year" title="سال قبل"><i class="left-arrow2"></i></div>

                <div class="left">
                    <span class="btn active">ﻫ.ش.</span>
                    <span class="btn">میلادی</span>
                    <span class="btn">ﻫ.ق.</span>
                </div>
            </div>
            <div class="dates">
                <table>
                    <tr>
                        <th>شنبه</th>
                        <th>یکشنبه</th>
                        <th>دوشنبه</th>
                        <th>سه‌شنبه</th>
                        <th>چهارشنبه</th>
                        <th>پنجشنبه</th>
                        <th>جمعه</th>
                    </tr>

                    <tr v-for="row in days">
                        <td v-for="day in row">
                            <div class="day" @click="onDayClick">{{ $root.LanguageManager.convertAllDigitsToPersian(day.toString()) }}</div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OSDate",
        props: {
            label: {
                type: String,
            },
            width: {
                type: String
            }
        },
        data() {
            return {
                is_focused: false,
                show_menu: false,

                days: [
                    [28, 29, 30, 31, 1, 2, 3],
                    [4, 5, 6, 7, 8, 9, 10],
                    [11, 12, 13, 14, 15, 16, 17],
                    [18, 19, 20, 21, 22, 23, 24],
                    [25, 26, 27, 28, 29, 30, 31],
                    [1, 2, 3, 4, 5, 6, 7]
                ]
            }
        },
        methods: {
            onFocus: function() {
                this.is_focused = true;
                // this.show_menu = true;
            },
            onIconClick: function () {
                this.show_menu = !this.show_menu;
                this.is_focused = this.show_menu;
            },
            onOutsideClick: function () {
                this.show_menu = false;
                this.is_focused = false;
            },
            onKeypress: function(event) {
                if(!"0123456789./-".includes(event.key)) {
                    event.preventDefault();
                    return false;
                }
            },
            onDayClick: function () {
                //TODO
                // this.show_menu = false;
                // this.$refs.main_input.focus();
                // this.is_focused = true;
            }
        },
    }
</script>

<style scoped>

</style>