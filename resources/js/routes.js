import EmployeesIndex from './components/employees/Index';
import EmployeesCreate from './components/employees/Create';
import EmployeesEdit from './components/employees/Edit';

export const routes = [
    {
        path: '/employees',
        name: 'index',
        component: EmployeesIndex
    },
    {
        path: '/employees/create',
        name: 'create',
        component: EmployeesCreate
    },
    {
        path: '/employees/:id',
        name: 'edit',
        component: EmployeesEdit
    }
];