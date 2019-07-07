import React, { useState, useEffect } from "react";
import {
    Typography,
    List,
    ListItem,
    ListItemText,
    Box,
    TextField,
    Button,
    FormHelperText
} from "@material-ui/core";
import { withLayout } from "./Layout";
import API from "../api";

const PLACEHOLDERS = [
    "Enter your answer here...",
    "Write something here...",
    "Please reply here..."
];

function getPlaceholder() {
    const randomIndex = Math.floor(Math.random() * PLACEHOLDERS.length);

    return PLACEHOLDERS[randomIndex];
}
const placeholder = getPlaceholder();

function Answer(props) {
    return (
        <ListItem divider>
            <ListItemText>{props.body}</ListItemText>
        </ListItem>
    );
}

function Question(props) {
    const [value, setValue] = useState("");
    const [error, setError] = useState(null);

    function handleChange(e) {
        const val = e.target.value;

        setValue(val);
    }

    function handleClick() {
        if (value.length < 5) {
            setError("The answer must be at least 5 chars.");

            return;
        }

        API.createAnswer(props.id, value).then(id => {
            props.dispatch({
                type: "ADD_ANSWER",
                questionId: props.id,
                answer: { id, body: value }
            });

            setValue("");
            setError(null);
        });
    }

    return (
        <>
            <section>
                <Typography component="h1" variant="h4">
                    <Box
                        bgcolor="primary.main"
                        color="primary.contrastText"
                        p={3}
                    >
                        {props.body}
                    </Box>
                </Typography>
                <List>
                    {props.answers.map(answer => (
                        <Answer key={answer.id} {...answer} />
                    ))}
                </List>
            </section>
            <section>
                <TextField
                    label={placeholder}
                    variant="outlined"
                    value={value}
                    onChange={handleChange}
                    error={error !== null}
                    fullWidth
                />
                {error !== null && <FormHelperText>{error}</FormHelperText>}
                <Box mt={1} display="flex" justifyContent="flex-end">
                    <Button
                        variant="contained"
                        color="primary"
                        onClick={handleClick}
                    >
                        Answer
                    </Button>
                </Box>
            </section>
        </>
    );
}

export default withLayout(Question);
