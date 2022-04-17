<template>
    <section>
        <div v-if="errors !== ''">
            {{ errors }}
        </div>
        <form @submit.prevent="saveDoctor">
            <div>
                <label for="name">Name</label>
                <input id="name" class="block mt-1 w-full" type="text" 
                        name="name" v-model="form.name" required autofocus />
            </div>

            <div>
                <label for="email">Email</label>
                <input id="email" class="block mt-1 w-full" type="email" 
                    name="email" v-model="form.email" required />
            </div>

            <div>
                <label for="address">Address</label>
                <input id="address" class="block mt-1 w-full" type="address" 
                        name="address" v-model="form.address" style="border: 1px solid;"/>
            </div>

            <div>
                <label for="website">Website</label>
                <input id="website" class="block mt-1 w-full" type="text" 
                        name="website" v-model="form.website" />
            </div>

            <div>
                <input type="submit" value="Save Doctor">
            </div>

        </form>
    </section>
</template>


<script>
import { reactive } from "vue";
import useDoctors from '../../composables/Doctors'

export default {
    setup() {

        const form = reactive({
            'name': '',
            'email': '',
            'address': "",
            'website': "",
        })

        const { errors, storeDoctor } = useDoctors()

        const saveDoctor = async () => {
            await storeDoctor({...form});
        }

        return {
            form,
            errors,
            saveDoctor
        }
    }
}
</script>

