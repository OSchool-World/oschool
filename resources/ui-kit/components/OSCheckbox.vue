<template>
    <div :class="['os-checkbox', {focus: is_focused}]">
        <div class="checkbox" @click="click"><i class="check" v-if="is_checked"></i></div>
        <label>{{ label }}</label>
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
            checked: {
                type: [Boolean, Array],
                default: false
            },
            value: {

            }
        },
        model: {
            prop: 'checked',
            event: 'change',
        },
        data() {
            return {
                is_focused: false,
            }
        },
        computed: {
            is_checked() {
                if(typeof this.checked === 'boolean')
                    return this.checked;
                else if(Array.isArray(this.checked))
                    return this.checked.find((el) => el == this.value) == undefined ? false : true;
            }
        },
        methods: {
            click: function () {
                let new_val = !this.is_checked;

                if(typeof this.checked === 'boolean') {
                    this.$emit('change', new_val);
                } else if(Array.isArray(this.checked)) {
                    if(new_val)
                        this.$emit('change', this.checked.concat([this.value]));
                    else
                        this.$emit('change', this.checked.filter((item) => item != this.value));
                }
            }
        },
    }
</script>

<style scoped>

</style>
