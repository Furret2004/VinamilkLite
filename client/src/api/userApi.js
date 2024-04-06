import axiosClient from './axiosClient';

const userApi = {
  getUsers() {
    return axiosClient('/users');
  },
};

export default userApi;
