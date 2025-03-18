<template>
  <q-page padding>
    <h1 class="text-h4">Create Posts</h1>
    <q-input label="title" Rounded outlined type="text" v-model="title" />
    <q-input label="body" Rounded outlined type="text" v-model="body" />
    <q-input label="status" Rounded outlined type="text" v-model="status" />
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
const status = ref('')
const router = useRouter()

function createpost() {
  api
    .post('/api/post', {
      title: title.value,
      body: body.value,
      time: time.value,
      status: status.value,
    })
    .then((r) => {
      Notify.create({
        type: 'positive',
        message: r.data.message,
      })
      router.push('/posts')
    })
    .catch((e) => {
      console.error(e.response)
      Notify.create({
        type: 'negative',
        message: e,
      })
    })
}
</script>
