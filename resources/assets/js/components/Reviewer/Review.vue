<template>
  <div class="card card-default my-1">
    <div class="card-header d-flex justify-content-between">
      <span v-text="sUserName" />
      <span v-text="new Date(sCreatedAt).toLocaleString('ru-RU')" />
    </div>
    <div class="card-body" v-text="sText" />
    <div class="card-body">
      <img
        class="img-thumbnail mr-1"
        v-for="(image,index) in aImages"
        :key="index"
        :src="`storage/images/${image.file_name}`"
        width="100"
      >
    </div>
  </div>
</template>

<script>
    export default {
        props: {
            sUserName: String,
            sCreatedAt: String,
            sText: String,
            aImages: Array,
        },
    }
</script>
