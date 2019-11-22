//Directives
import OSClosable from './directives/OSClosable';

//Components
import OSInput from "./components/OSInput.vue";
import OSMainNav from "./components/OSMainNav";
import OSTime from "./components/OSTime";
import OSDate from "./components/OSDate";
import OSSelect from "./components/OSSelect";
import OSCheckbox from "./components/OSCheckbox";
import OSRadio from "./components/OSRadio";
import OSListbox from "./components/OSListbox";
import OSTextarea from "./components/OSTextarea";
import OSTab from "./components/OSTab";
import OSTabPage from "./components/OSTabPage";
import OSStep from "./components/OSStep";
import OSStepPage from "./components/OSStepPage";
import OSNotification from "./components/OSNotification";
import OSDropdown from "./components/OSDropdown";
import OSDatagrid from "./components/OSDatagrid";

let OSchoolUIKit = {
    install: function (Vue, option) {
        Vue.directive('closable', OSClosable);
        Vue.component('os-main-nav', OSMainNav);
        Vue.component('os-input', OSInput);
        Vue.component('os-time', OSTime);
        Vue.component('os-date', OSDate);
        Vue.component('os-select', OSSelect);
        Vue.component('os-checkbox', OSCheckbox);
        Vue.component('os-radio', OSRadio);
        Vue.component('os-listbox', OSListbox);
        Vue.component('os-textarea', OSTextarea);
        Vue.component('os-tab', OSTab);
        Vue.component('os-tab-page', OSTabPage);
        Vue.component('os-step', OSStep);
        Vue.component('os-step-page', OSStepPage);
        Vue.component('os-notification', OSNotification);
        Vue.component('os-dropdown', OSDropdown);
        Vue.component('os-datagrid', OSDatagrid);
    }
};

export default OSchoolUIKit;