<template>
  <form method="get" class="form-group" @submit.prevent="send">
    <div class="alert form-group">
      <input
        type="text"
        class="form-control form-control-lg p-3 text-primary"
        name="fname"
        id="search"
        placeholder="search anything "
        autofocus
        autocomplete="off"
      />
    </div>
  </form>
</template>

<script>
import autoSearch from "../helpers/autoSearch.jsx";
import autocomplete from "autocomplete.js";
import alogoliasearch from "algoliasearch";

export default {
  data() {
    return {};
  },
  methods: {
    send() {
      return console.log("form submitted");
    }
  },
  mounted() {
    autoSearch("indexusers").on("autocomplete:selected", function(
      event,
      suggestion,
      dataset,
      context
    ) {
      console.log(event, suggestion, dataset, context);
      window.location.assign(route('member.page', suggestion.id));

    });
  } // mounted end
}; // end of export default
</script>