<template>
  <q-page padding>
    <h1 class="text-h5">welcome to register page</h1>
    <div class="row q-pa-lg">
      <div class="col-6">
        <q-input label="name" Rounded outlined type="text" v-model="name" />
      </div>
      <div class="col-6">
        <q-input label="email" Rounded outlined type="email" v-model="email" />
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
      <div class="col-6">
        <q-input
          label="confirm password"
          Rounded
          outlined
          :type="isPwdco ? 'password' : 'text'"
          v-model="confirm"
          ><template v-slot:append>
            <q-icon
              :name="isPwdco ? 'visibility_off' : 'visibility'"
              class="cursor-pointer"
              @click="isPwdco = !isPwdco"
            /> </template
        ></q-input>
      </div>
      <q-btn label="Register" @click="register" class="q-my-md" color="green-9" />
    </div>
  </q-page>
</template>

<script setup>
import { ref } from 'vue'

const isPwd = ref(true)
const isPwdco = ref(true)
</script>
