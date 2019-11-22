<template>
    <div :class="['os-checkbox', {focus: is_focused}]">
        <div class="checkbox" @click="click"><i class="check" v-if="checkbox_input"></i></div>
        <label>{{ label }}</label>
        <input type="checkbox" v-model="checkbox_input">
    </div>
</template>

<script>
    export default {
        name: "OSCheckbox",
        props: {
            width: {
                type: String,
            },
            label: {
                type: String,
            },
        },
        data() {
            return {
                is_focused: false,
                checkbox_input: false,
            }
        },
        methods: {
            click: function () {
                this.checkbox_input = !this.checkbox_input;
            }
        },
    }
</script>

<style scoped>

</style>