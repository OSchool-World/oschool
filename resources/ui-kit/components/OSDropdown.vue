<template>
    <div class="os-dropdown" ref="root">
        <div class="button" @click="toggleMenu" v-closable="{exclude: ['root'], handler: 'onOutsideClick'}">
            <slot></slot>
        </div>
        <div class="menu" v-if="is_open_menu">
            <ul>
                <li v-for="item in items" @click="itemClicked(item)">
                    <i :class="item.icon"></i>
                    <div class="title">{{ item.title }}</div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OSDropdown",
        props: {
            items: {
                type: Array,
                required: true,
            }
        },
        data() {
            return {
                is_open_menu: false,
            }
        },
        methods: {
            toggleMenu: function () {
                this.is_open_menu = !this.is_open_menu;
            },
            onOutsideClick: function () {
                this.is_open_menu = false;
            },
            itemClicked: function (item) {
                this.is_open_menu = false;

                if(item.callback)
                    item.callback();
            }
        }
    }
</script>

<style scoped>

</style>