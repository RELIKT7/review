<template>
  <div class="card card-default">
    <div class="card-header" v-text="'Залишити відгук'" />

    <div class="card-body">
      <span v-text="'Кілька слів'" />
      <form
        method="post"
        action="/reviews"
        @submit.prevent="post"
      >
        <textarea
          class="d-block w-100"
          maxlength="1000"
          rows="5"
          v-model="text"
          required
        />
        <input
          class="d-block my-1"
          type="file"
          accept="image/*"
          multiple @change="change"
        >
        <input
          class="d-block float-end"
          type="submit"
          value="Відправити"
          :disabled="!text"
        >
      </form>
    </div>
  </div>
</template>

<script>

    export default {
        data() {
            return {
                text: null,
                images: null,
            };
        },
        methods: {
            store(review) {
                this.$store.commit('storeReview', review);
            },
            async post() {
                const formData = new FormData();
                formData.append("text", this.text);
                this.images?.forEach(image =>
                    formData.append("images[]", image));

                await this.axios({
                    method: "post",
                    url: `/reviews`,
                    data: formData
                })
                    .then(async (response) => {
                        console.table(response.data);
                        this.store(response.data)
                    })
                    .catch((error) => {
                        console.error(error)
                    });
            },
            change(event) {
                this.images = Array.from(
                    event.target.files
                );
            },
        },
    }
</script>
