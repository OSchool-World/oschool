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


];

export default routes;