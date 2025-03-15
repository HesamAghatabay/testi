<template>
  <q-page padding>
    <h1 class="text-h4">login page</h1>
    <div class="row">
      <div class="col-6">
        <q-input
          label="Enter Email"
          Rounded
          outlined
          type="email"
          v-model="email"
          suffix="@gmail.com"
        />
      </div>
      <div class="col-6">
        <q-input
          label="password"
          Rounded
          outlined
          :type="isPwd ? 'password' : 'text'"
          v-model="password"
          ><template v-slot:append>
            <q-icon
              :name="isPwd ? 'visibility_off' : 'visibility'"
              class="cursor-pointer"
              @click="isPwd = !isPwd"
            /> </template
        ></q-input>
      </div>
      <q-btn label="Login" @click="login" color="green-9" />
    </div>
  </q-page>
</template>

<script setup>
import { Notify } from 'quasar'
import { api } from 'src/boot/axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const email = ref('')
const password = ref('')
const isPwd = ref(true)
const router = useRouter()

function login() {
  if (!email.value || !password.value) {
    Notify.create({
      type: 'negative',
      message: 'full filds',
    })
  }
  api
    .post('oauth/token', {
      grant_type: 'password',
      client_id: 2,
      client_secret: 'tyjuPCQC6TQwUqRiNImrNG6OZY5yu6i6y5zwXvmQ',
      username: email.value,
      password: password.value,
      scope: '*',
    })
    .then((r) => {
      if (r.data.access_token) {
        localStorage.setItem('access_token', r.data.access_token)
        api.defaults.headers = {
          Authorization: 'Bearer ' + localStorage.getItem('access_token'),
          'Content-Type': 'application/json',
          Accept: 'application/json;charset=UTF-8',
        }
        Notify.create({
          type: 'positive',
          message: 'login OK ' + r.data.message,
        })
        router.push('/profile')
      } else {
        Notify.create({
          type: 'negative',
          message: 'No access_token',
        })
      }
    })
    .catch((e) => {
      Notify.create({
        type: 'negative',
        message: 'catch ' + e,
      })
    })
}
</script>
