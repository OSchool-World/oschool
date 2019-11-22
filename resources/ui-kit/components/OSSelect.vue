<template>
    <div :class="['os-input', {focus: is_focused}]" ref="root">
        <label>{{ label }}</label>
        <div class="input" :style="{width: width}">
            <span class="icon selectable" v-closable="{exclude: ['root'], handler: 'onOutsideClick'}" @click="onIconClick"><i class="down-arrow"></i></span>
            <input ref="main_input" @keypress="onKeypress" type="text" :placeholder="label" @focus="onFocus" :value="selected_item.text">
        </div>
        <div class="menu select" v-show="show_menu">
            <div class="items">
                <ul>
                    <li :class="{active: selected_item == item, multiple: multiple}" v-for="item in items" @click="onItemClick(item)">
                        <os-checkbox :label="item.text" v-if="multiple"></os-checkbox>
                        <span v-else>{{ item.text }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OSSelect",
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
                type: Array,
                default: []
            },
            text: {
                type: String,
                default: 'text'
            }
        },
        data() {
            return {
                is_focused: false,
                show_menu: false,
                selected_item: {text: ""},
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
            onItemClick: function (item) {
                if(!this.multiple) {
                    this.selected_item = item;
                    this.show_menu = false;
                }
            },
            onKeypress: function(event) {

            }
        },
    }
</script>

<style scoped>

</style>