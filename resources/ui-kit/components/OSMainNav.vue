<template>
    <nav :class="{collapsed: is_collapsed}">
        <div class="logo">
            <img src="images/logo64.png" alt="OSchool Logo" :class="{collapsed: is_collapsed}">
            <div class="text">
                <div class="brand-fa">پلتفرم متن‌باز مدرسه</div>
                <div class="brand-en">School Open Source Platform</div>
            </div>
        </div>
        <div class="collapse">
            <div class="collapse-btn" @click="toggle_collapse"><i :class="is_collapsed ? 'left-arrow' : 'right-arrow'"></i></div>
        </div>
        <div class="tree">
            <div :class="{page1: true, out: is_active_page2}">
                <ul class="l1">
                    <li v-for="item_l1 in items" :class="{collapse: item_l1.is_collapsed}">
                        <div class="item" @click="l1_item_clicked(item_l1)">
                            <span class="icon"><i :class="item_l1.icon"></i></span>
                            <span class="title">{{ item_l1.title }}</span>
                            <span class="arrow"><i :class="item_l1.is_collapsed ? 'down-arrow' : 'up-arrow'"></i></span>
                        </div>
                        <ul class="l2" :style="{height: item_l1.is_collapsed ? 0 : (29*item_l1.sub_list.length + 'px')}">
                            <li v-for="item_l2 in item_l1.sub_list" @click="l2_item_clicked(item_l2)">
                                <span class="icon">{{ item_l2.icon }}</span>
                                <span class="title">{{ item_l2.title }}</span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div :class="{page2: true, out: !is_active_page2}">
                <div class="title-bar">
                    <div class="back-btn" @click="is_active_page2 = false"><i class="right-arrow3"></i></div>
                    <div class="title">{{ selected_item_l2.title }}</div>
                </div>
                <div v-if="selected_item_l2.sub_list.length <= 0" class="under-construction">
                    <img src="images/under-construction.png" alt="Under Construction">
                    <div class="title">در دست احداث ...</div>
                </div>
                <ul class="l3">
                    <li v-for="item_l3 in selected_item_l2.sub_list">
                        <div :class="{item: true, collapsed_nav: is_collapsed}">{{ item_l3.title }}</div>
                        <ul class="l4">

                            <template v-for="item_l4 in item_l3.sub_list">
                                <router-link v-if="item_l4.route" :to="{name: item_l4.route}" tag="li">
                                    <div class="item">
                                        <!-- <span class="icon">{{ item_l4.icon }}</span> -->
                                        <span class="icon"><i :class="item_l4.icon ? item_l4.icon : 'document'"></i></span>
                                        <span class="title">{{ item_l4.title }}</span>
                                    </div>
                                </router-link>

                                <li v-else>
                                    <div class="item">
                                        <!-- <span class="icon">{{ item_l4.icon }}</span> -->
                                        <span class="icon"><i :class="item_l4.icon ? item_l4.icon : 'document'"></i></span>
                                        <span class="title">{{ item_l4.title }}</span>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</template>

<script>
    export default {
        name: "OSMainNav",
        props: {
            items: {
                type: Array,
                default: []
            },
        },
        data() {
            return {
                selected_item_l2: [],
                is_collapsed: false,
                is_active_page2: false,
            }
        },
        methods: {
            toggle_collapse: function () {
                this.is_collapsed = !this.is_collapsed;

                if(this.is_collapsed)
                    this.$emit("collapse");
                else
                    this.$emit("expand");
            },
            collapse_all_l1: function (except_item = -1) {
                this.items.forEach(element => {
                    if(element != except_item)
                        element.is_collapsed = true;
                });
            },
            l1_item_clicked: function (item_l1) {
                this.collapse_all_l1(item_l1);
                item_l1.is_collapsed = !item_l1.is_collapsed;
                this.$forceUpdate();
            },
            l2_item_clicked: function (item_l2) {
                this.selected_item_l2 = item_l2;
                this.is_active_page2 = true
            }
        },
        created: function () {
            this.collapse_all_l1();
            this.selected_item_l2 = this.items[0].sub_list[0];
        }
    }
</script>

<style scoped>

</style>