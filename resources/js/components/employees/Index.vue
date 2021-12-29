<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>

    <div class="card">
        <div v-if="showMessage">
            <div class="alert alert-success">{{ message }}</div>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form>
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" v-model.lazy="search" class="form-control mb-2"  placeholder="Search...">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>
                            <div class="col">
                                <select
                                v-model="selectedDepartment"
                                name="city"
                                class="form-control"
                                aria-label="Default select example"
                            >
                                <option v-for="department in departments" :key="department.id" :value="department.id">{{department.name}}</option>
                            </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <router-link :to="{name: 'create'}" class="btn btn-primary float-right">Create</router-link>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Department</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                        <tr v-for="employee in employees" :key="employee.id">
                            <th scope="row">#{{employee.id}}</th>
                            <td>{{employee.first_name}}</td>
                            <td>{{employee.last_name}}</td>
                            <td>{{employee.address}}</td>
                            <td>{{employee.department.name}}</td>
                            <td>
                                <router-link :to="{name: 'edit', params: {id: employee.id}}" class="btn btn-primary float-right">Edit</router-link>
                                <button class="btn btn-danger" @click="deleteEmployee(employee.id)">Delete</button>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            employees: [],
            showMessage: false,
            message: '',
            search: null,
            selectedDepartment: null,
            departments: [],
        };
    },
    watch: {
        search(){
            this.getEmployees();
        },
        selectedDepartment(){
            this.getEmployees();
        }
    },
    methods: {
        getEmployees(){
            axios.get('/api/employees', {params: {
                search: this.search,
                department_id: this.selectedDepartment
            }})
            .then(response => {
                this.employees = response.data.data;
            }).catch(error => {
                console.log(error);
            });
        },
        getDepartments(){
            axios.get('/api/employees/departments').then(response => {
                this.departments = response.data;
            }).catch(error => {
                console.log(error);
            })
        },
        deleteEmployee(id){
            axios.delete('/api/employees/'+ id).then(response => {
                this.showMessage = true;
                this.message = response.data;
                this.getEmployees();
            })
        }
    },
    created() {
        this.getEmployees();
        this.getDepartments();
    }
}
</script>

<style>

</style>