<template>
    <div :class="{'os-step': true, horizental: mode == 'horizental'}">
        <!-- <div class="rectangle"></div> -->
        <template v-for="(page, index) in pages">
            <div class="page-info">
                <div :class="{circle: true, active: index+1 == step}">
                    {{ $root.LanguageManager.convertAllDigitsToPersian((index + 1).toString()) }}
                </div>
                <div :class="{title: true, active: index+1 == step}">
                    {{ page.name }}
                </div>
            </div>
            <div :class="{rectangle: true, 'no-border': index+1 == pages.length}" v-if="!(mode == 'horizental' && index+1 == pages.length)">
                <div v-if="mode != 'horizental' && index+1 == step" v-html="page.$el.outerHTML"></div>
            </div>
        </template>

        <div class="flex-break"></div>

        <div class="horizental-content" v-if="mode == 'horizental' && pages[step-1]" v-html="pages[step-1].$el.outerHTML"></div>

        <div v-show="false">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    import OSStepPage from './OSStepPage';

    export default {
        name: "OSStep",
        components: { OSStepPage },
        props: {
            step: {
                type: Number,
                required: true
            },
            mode: {
                type: String
            }
        },
        data() {
            return {
                pages: []
            }
        },
        created: function () {
            this.pages = this.$children;
        },
    }
</script>

<style scoped>

</style>