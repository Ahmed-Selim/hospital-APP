<template>
    <section>
        <div v-if="errors !== ''">
            {{ errors }}
        </div>
        <form @submit.prevent="saveDoctor">
            <div>
                <label for="name">Name</label>
                <input id="name" class="block mt-1 w-full" type="text" 
                        name="name" v-model="doctor.name" required autofocus />
            </div>

            <div>
                <label for="email">Email</label>
                <input id="email" class="block mt-1 w-full" type="email" 
                    name="email" v-model="doctor.email" required />
            </div>

            <div>
                <label for="address">Address</label>
                <input id="address" class="block mt-1 w-full" type="address" 
                        name="address" v-model="doctor.address" style="border: 1px solid;"/>
            </div>

            <div>
                <label for="website">Website</label>
                <input id="website" class="block mt-1 w-full" type="text" 
                        name="website" v-model="doctor.website" />
            </div>

            <div>
                <input type="submit" value="Update Doctor">
            </div>

        </form>
    </section>
</template>


<script>
import { reactive } from "vue";
import useDoctors from '../../composables/Doctors'
import { onMounted } from "vue"

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    }, 

    setup(props) {

        const { errors, doctor, getDoctor, updateDoctor } = useDoctors()

        onMounted(getDoctor(props.id))

        const saveDoctor = async () => {
            await updateDoctor(props.id);
        }

        return {
            doctor,
            errors,
            saveDoctor
        }
    }
}
</script>

