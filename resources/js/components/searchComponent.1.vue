<template>
  <div>
    <form action method="get" class @submit.prevent="send">
      <div class="alert form-group">
        <input
          type="text"
          class="form-control form-control-lg p-3"
          name="search"
          id="search"
          placeholder="search..."
          autofocus
        />
      </div>
    </form>
  </div>
</template>

<script>
import SearchAuto from "../helpers/SearchAuto";
//window.axios = require("axios");
export default {
  data() {
    return {
      route: ""
    };
  },
  props: ["createurl"],
  methods: {
    send() {
      //   return axios
      //     .get(route("school.courses", { school: 1 }))
      //     .then(response => {
      //       return response.data;
      //     });
    }
  },

  mounted() {
    SearchAuto("modules").on(
      "autocomplete:selected",
      (event, suggestion, dataset, selection, context) => {
        // weconsoloe.log(event);
      }
    );
  } // mounted
};
</script>
