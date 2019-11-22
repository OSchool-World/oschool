<template>
    <div :class="['os-input', {focus: is_focused}, type]">
        <label>{{ label }}</label>
        <div class="input" :style="{width: width}">
            <span v-if="show_icon" class="icon"><i :class="[symbol_name]"></i></span>
            <input @keypress="onKeypress" :type="html_input_type" :placeholder="label" @focus="onFocus" @blur="onBlur">
            <span class="unit" v-if="show_unit">{{ unit }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OSInput",
        props: {
            unit: {
                type: String
            },
            width: {
                type: String
            },
            label: {
                type: String
            },
            type: {
                type: String,
                default: 'text'
            }
        },
        data() {
            return {
                is_focused: false,
                show_icon: true,
                symbol_name: "",
                html_input_type: 'text',
                show_unit: false,
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
                if(this.type == "int") {
                    if(!"0123456789".includes(event.key)) {
                        event.preventDefault();
                        return false;
                    }
                } else if (this.type == "float") {
                    if(!"0123456789.".includes(event.key) || (event.key == "." && event.target.value.includes("."))) {
                        event.preventDefault();
                        return false;
                    }
                }
            }
        },
        created: function() {
            switch (this.type) {
                case "text":
                    this.show_unit = false;
                    this.show_icon = false;
                    break;

                case "int":
                case "float":
                    this.show_unit = this.unit;
                    this.show_icon = true;
                    this.symbol_name = this.type;
                    break;

                case "password":
                    this.show_unit = false;
                    this.show_icon = true;
                    this.symbol_name = this.type;
                    this.html_input_type = "password";
                    break;

                default:
                    break;
            }
        }
    }
</script>