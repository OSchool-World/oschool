import PublicPages from './public-pages/index';
import UserManagement from './modules/user-management/module';

let routes = [

    {
        path: '/not_found_404',
        name: 'not_found',
        component: PublicPages.PNotFound404,
    },
    {
        path: '/users',
        name: 'user_management.users',
        component: UserManagement.PUsers,
    },
    {
        path: '/users/wizard',
        name: 'user_management.user_wizard',
        component: UserManagement.PUserWizard,
    },
    {
        path: '*',
        redirect: { name: 'not_found' }
    }

];

export default routes;