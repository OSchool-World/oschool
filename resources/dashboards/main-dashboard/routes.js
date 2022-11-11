import PublicPages from './public-pages/index';
import UserManagement from './modules/user-management/module';
import EducationSystem from './modules/education-system/module';

let routes = [

    {
        path: '/not_found_404',
        name: 'not_found',
        component: PublicPages.PNotFound404,
    },
    {
        path: '/user_management/users',
        name: 'user_management.users',
        component: UserManagement.PUsers,
    },
    {
        path: '/user_management/users/wizard',
        name: 'user_management.user_wizard',
        component: UserManagement.PUserWizard,
    },
    {
        path: '/education_system/branches',
        name: 'education_system.branches',
        component: EducationSystem.PBranches,
    },
    {
        path: '/education_system/education_systems',
        name: 'education_system.education_systems',
        component: EducationSystem.PEducationSystems,
    },
    {
        path: '/education_system/academic_years',
        name: 'education_system.academic_years',
        component: EducationSystem.PAcademicYears,
    },
    {
        path: '/education_system/academic_years/add',
        name: 'education_system.academic_year',
        component: EducationSystem.PAcademicYear,
    },
    {
        path: '*',
        redirect: { name: 'not_found' }
    }

];

export default routes;
