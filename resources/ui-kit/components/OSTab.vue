<template>
    <div class="os-tab">
        <div class="tab-btns">
            <ul>
                <li v-for="(tab, index) in tabs" @click="selectTab(tab)" :class="{active: tab == activeTab}">
                    {{ tab.name ? tab.name : 'tab' + (index+1) }}
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
            }
        },
        watch: {
            activeTab: function () {
                this.tabs.forEach(tab => {
                    tab.isActive = (this.activeTab.name == tab.name);
                });
            }
        },
        created: function () {
            this.tabs = this.$children;

            this.$nextTick(function () {
                if(this.tabs.length > 0)
                    this.activeTab = this.tabs[0];
            })
        }
    }
</script>

<style scoped>

</style>