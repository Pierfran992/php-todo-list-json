<script>
import axios from 'axios';

const API_URL = "http://localhost/";

export default {
  name: "App",
  data() {
    return {
      todoList: [],
    };
  },

  methods: {
    getAllData() {
      axios.get(API_URL + "api.php")
        .then(res => {
          const data = res.data;
          this.todoList = data;
        });
    }
  },
  mounted() {

    this.getAllData();
  }
}
</script>

<template>
  <div class="container">
    <h1>Todo List</h1>
    <div class="ctn_list">
      <ul>
        <li v-for="(elem, ind) in todoList" :key="ind">
          {{ elem.text }}
        </li>
      </ul>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.container {
  background-color: blue;
  width: 900px;
  height: 700px;
  margin: 100px auto;
  text-align: center;

  h1 {
    color: #ffffff;
  }

  .ctn_list {
    margin-top: 20px;
    width: 100%;
    padding: 10px;
  }
}
</style>
