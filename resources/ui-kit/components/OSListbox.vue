<template>
    <div :class="['os-listbox', {focus: is_focused}]">
        <label>{{ label }}</label>
        <div class="list" :style="{'min-height': minHeight}">
            <div class="items">
                <ul>
                    <li v-for="item in items" @click="selected_item = item" :class="{active: selected_item == item, multiple: multiple}">
                        <os-checkbox :label="item[text]" v-if="multiple" v-model="selected_items" :value="item"></os-checkbox>
                        <span v-else>{{ item[text] }}</span>
                        <div class="item-btns">
                            <i v-if="withDelete" class="delete" @click="$emit('clickDeleteItem', item)"></i>
                            <i v-if="withEdit"   class="edit"   @click="$emit('clickEditItem', item)"></i>
                        </div>
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
            withDelete: {
                type: Boolean,
                default: false
            },
            withEdit: {
                type: Boolean,
                default: false
            },
            value: {
                type: [Array, Object],
                default: null
            },
            minHeight: {
                type: String,
                default: 'none'
            }
        },
        data() {
            return {
                is_focused: false,
                selected_item: {text: ""},
                selected_items: []
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
        watch: {
            selected_item(newValue, oldValue) {
                if(!this.multiple)
                    this.$emit('input', newValue);
            },
            selected_items(newValue, oldValue) {
                if(this.multiple)
                    this.$emit('input', newValue);
            }
        },
    }
</script>

<style scoped>

</style>
