<template>
    <div class="os-tab">
        <div class="tab-btns">
            <ul>
                <li v-for="(tab, index) in tabs" @click="selectTab(tab)" :class="{active: tab == activeTab}">
                    {{ tab.title ? tab.title : 'tab' + (index+1) }}
                </li>
                <li v-if="clickAddButton" @click="clickAddButton">
                    +
                </li>
            </ul>
        </div>

        <div class="tab-pages">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    import OSTabPage from './OSTabPage';

    export default {
        name: "OSTab",
        props: {
            clickAddButton: {
                type: Function,
                default: null
            },
            value: {
                type: [String, Number]
            }
        },
        components: { OSTabPage },
        data() {
            return {
                tabs: [],
                activeTab: null,
            }
        },
        methods: {
            selectTab: function (tab_page) {
                this.activeTab = tab_page;
                this.$emit('input', tab_page.id);
            }
        },
        watch: {
            activeTab: function () {
                this.tabs.forEach(tab => {
                    tab.isActive = (this.activeTab.title == tab.title);
                });
            },
            tabs: function () {
                if(!this.activeTab && this.tabs.length > 0)
                    if(this.value) {
                        var active_tab = this.tabs.find((teb) => {
                            return teb.id == this.value
                        });

                        if(active_tab)
                            this.activeTab = active_tab;
                        else
                            this.activeTab = this.tabs[0];
                    } else {
                        this.activeTab = this.tabs[0];
                    }
            }
        },
        created: function () {
            this.tabs = this.$children;
        }
    }
</script>

<style scoped>

</style>
