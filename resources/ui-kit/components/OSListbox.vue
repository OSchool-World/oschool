<template>
    <div :class="['os-listbox', {focus: is_focused}]">
        <label>{{ label }}</label>
        <div class="list">
            <div class="items">
                <ul>
                    <li v-for="item in items" @click="selected_item = item" :class="{active: selected_item == item, multiple: multiple}">
                        <os-checkbox :label="item[text]" v-if="multiple"></os-checkbox>
                        <span v-else>{{ item[text] }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OSListbox",
        props: {
            width: {
                type: String,
            },
            label: {
                type: String,
            },
            multiple: {
                type: Boolean,
            },
            items: {
                type: Array
            },
            text: {
                type: String,
                default: "text"
            },
        },
        data() {
            return {
                is_focused: false,
                selected_item: {text: ""},
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