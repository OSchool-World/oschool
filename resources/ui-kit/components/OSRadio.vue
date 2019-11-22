<template>
    <div :class="['os-radio', {focus: is_focused}]">
        <div class="radio" @click="click"><div class="check" v-if="radio_input"></div></div>
        <label>{{ label }}</label>
        <input type="radio" v-model="radio_input">
    </div>
</template>

<script>
    export default {
        name: "OSRadio",
        props: {
            width: {
                type: String
            },
            label: {
                type: String
            }
        },
        data() {
            return {
                is_focused: false,
                radio_input: false,
            }
        },
        methods: {
            click: function () {
                this.radio_input = true;
            }
        },
    }
</script>

<style scoped>

</style>