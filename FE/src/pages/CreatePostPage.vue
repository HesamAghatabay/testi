<template>
  <q-page padding>
    <h1>createposts</h1>
    <q-input label="title" Rounded outlined type="title" v-model="title" />
    <q-input label="body" Rounded outlined type="body" v-model="body" />
    <q-input label="status" Rounded outlined type="status" v-model="status" />
    <q-input label="time" Rounded outlined type="time" v-model="time" />
    <q-btn label="Create" @click="createpost" color="green-9" />
  </q-page>
</template>

<script setup>
import { Notify } from 'quasar'
import { api } from 'src/boot/axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const title = ref('')
const body = ref('')
const time = ref('')
const router = useRouter()

function createpost() {
  api
    .post('/api/post', {
      title: title.value,
      body: body.value,
      time: time.value,
    })
    .then((r) => {
      Notify.create({
        message: r.data,
      })
      router.push('posts')
    })
    .catch((e) => {
      Notify.create({
        message: e,
      })
    })
}
</script>
