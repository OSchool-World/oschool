<template>
    <div :class="['os-textarea', {focus: is_focused}]">
        <label>{{ label }}</label>
        <div class="input" :style="{width: width}">
            <textarea :placeholder="label" rows="6" @focus="onFocus" @blur="onBlur" @input="$emit('input', $event.target.value)" :value="value"></textarea>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OSTextarea",
        props: {
            width: {
                type: String,
            },
            label: {
                type: String,
            },
            value: {
                type: String,
                default: null
            }
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
        },
    }
</script>

<style scoped>

</style>
