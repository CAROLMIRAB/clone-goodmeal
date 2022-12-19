<template>
  <div>
    <ul>
      <li
        v-for="item in stores"
        :key="item.id"
      >
        {{ item.name }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'AllStores',

  data() {
    return {
      stores: [],
    };
  },
  created() {
    axios
      .get('http:/localhost:8000/api/stores/')
      .then((response) => {
        this.items = response.data;
      })
      .catch((error) => {
        console.error(error);
      });
  },
  methods: {},
};
</script>
