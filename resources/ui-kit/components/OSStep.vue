<!--<template>-->
    <!--<div :class="{'os-step': true, horizental: horizontal}">-->
        <!--&lt;!&ndash; <div class="rectangle"></div> &ndash;&gt;-->
        <!--<template v-for="(page, index) in pages">-->
            <!--<div class="page-info">-->
                <!--<div :class="{circle: true, active: index+1 == step}">-->
                    <!--{{ $root.LanguageManager.convertAllDigitsToPersian((index + 1).toString()) }}-->
                <!--</div>-->
                <!--<div :class="{title: true, active: index+1 == step}">-->
                    <!--{{ page.name }}-->
                <!--</div>-->
            <!--</div>-->
            <!--<div :class="{rectangle: true, 'no-border': index+1 == pages.length}" v-if="!(horizontal && index+1 == pages.length)">-->
                <!--<slot></slot>-->
            <!--</div>-->
        <!--</template>-->

        <!--<div class="flex-break"></div>-->

        <!--<div class="horizental-content" v-if="enable_rendering && horizontal && pages[step-1]">-->
            <!--<slot></slot>-->
        <!--</div>-->

        <!--<slot></slot>-->
    <!--</div>-->
<!--</template>-->

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
            horizontal: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                pages: [],
                enable_rendering: false,
            }
        },
        render(createElement, context) {
            let pages = this.$slots.default.filter(function (el) {
                return el.tag != undefined;
            });

            return createElement("div",
                { class: {'os-step': true, horizental: this.horizontal} },
                [
                    pages.map(function (page, index) {
                        return [
                            createElement("div", { class: "page-info" },
                                [
                                    createElement( "div", { class: {"circle": true, "active":  index+1 == this.step}}, this.$root.LanguageManager.convertAllDigitsToPersian((index + 1).toString()) ),
                                    createElement( "div", { class: {"title" : true, "active":  index+1 == this.step}}, "\n" + page.componentOptions.propsData['title'] + "\n" )
                                ]
                            ),
                            (index+1 < pages.length) ? createElement("div", { class: 'rectangle' }, [ (!this.horizontal && index+1 == this.step) ? page : null]) : null
                        ]
                    }, this),
                    createElement("div", { class: "flex-break" }),
                    this.horizontal ? createElement("div", { class: "horizental-content" }, [pages[this.step-1]]) : null
                ]
            );
        }

    }
</script>

<style scoped>

</style>