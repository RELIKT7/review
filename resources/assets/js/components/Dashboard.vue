<template>
  <div class="col-md-12">
    <form-review />

    <review
      v-for="(review, index) in Reviews"
      :key="index"
      :s-user-name="review.user_name"
      :s-text="review.text"
      :a-images="review.images"
    />
  </div>
</template>

<script>
    import FormReview from "./Reviewer/Form";
    import Review from "./Reviewer/Review";

    export default {
        components: {
            FormReview,
            Review
        },
        methods: {
            set(array) {
                this.$store.commit('setReviews', array);
            }
        },
        async mounted() {
            await this.axios({
                method: "get",
                url: `/reviews`,
            })
                .then(async (response) => {
                    console.table(response.data)

                    this.set(response.data ?? [])
                })
                .catch((error) => {
                    console.error(error)
                });
        },
        computed: {
            Reviews() {
                return this.$store.getters.Reviews;
            }
        }
    }
</script>
