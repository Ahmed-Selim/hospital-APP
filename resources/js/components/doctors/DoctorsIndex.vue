<template>
    <div>
    <router-link to="/doctors/create">+ create Doctor</router-link>
       
       
       <table class="table" border="1">
           <thead>
               <tr>
                   <th>id</th>
                   <th>name</th>
                   <th>address</th>
                   <th>website</th>
                   <th>edit</th>
                   <th>delete</th>
               </tr>
           </thead>
           <tbody>
                <tr v-for="doctor in this.doctors" :key="doctor.id">
                    <td>{{ doctor.id }}</td>
                    <td>{{ doctor.name }}</td>
                    <td>{{ doctor.address }}</td>
                    <td>{{ doctor.website }}</td>
                    <td><router-link :to="{name: 'doctors.edit', params: {id: doctor.id}}">edit</router-link></td>
                    <td><input type="button" value="X" @click="deleteDoctor(doctor.id)"></td>
                </tr>
           </tbody>
       </table>
    </div>

</template>

<script>
import useDoctors from '../../composables/Doctors';
import { onMounted } from "vue";

export default {
    setup() {
        const { doctors, getDoctors, destroyDoctor } = useDoctors()

        onMounted(getDoctors)

        const deleteDoctor = async(id) => {
            if (!window.confirm('Are you sure?')) {
                return
            }
            await destroyDoctor(id); 
            await getDoctors();
        }

        return {
            doctors,
            deleteDoctor
        }
    }
}
</script>