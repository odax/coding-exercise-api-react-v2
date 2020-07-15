import axios from 'axios';


export const getGroups = () => {
    return axios
    .get('/api/groups', {
        headers: {'Content-Type':'application/json'}
        })
        .then(
            res => {
                return res.data;
            }
        )
    }

export const addGroup = name => {
    return axios
    .post('/api/groups',
    {
        name: name
    },
    {
        headers: {'Content-Type':'application/json'}
    })
    .then(
        res => {
            console.log(res);
        }
    )
}

export const deleteGroup = id => {
    axios.delete(`api/group/${id}`, {
        headers:{'Content-Type':'application/json'}
    })
    .then(
        res => {
            console.log(res);
        }
    )
    .catch(
        err => {
            console.log(err);
        }
    )
}

export const updateItem = (name, id) => {
    return axios
    .put(`api/task/${id}`, {
        name: name
    },
    {
        headers:{'Content-Type':'application/json'}
    })
    .then (
        res => {
            console.log(res);
        }
    )
    .catch(
        err => {
            console.log(err);
        }
    )
}