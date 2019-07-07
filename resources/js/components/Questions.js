import React, { useState, useEffect } from "react";
import { Link as RouterLink } from "react-router-dom";
import {
    List,
    ListItem,
    ListItemText,
    ListItemSecondaryAction,
    Typography,
    Chip,
    Box,
    TextField,
    Button,
    FormHelperText
} from "@material-ui/core";
import { withLayout } from "./Layout";
import API from "../api";

const PLACEHOLDERS = [
    "Enter your question here...",
    "Write something here...",
    "Please ask anything..."
];

function getPlaceholder() {
    const randomIndex = Math.floor(Math.random() * PLACEHOLDERS.length);

    return PLACEHOLDERS[randomIndex];
}
const placeholder = getPlaceholder();

function formatAnswersBadge(answers) {
    const count = answers.length;

    let badge = `${count} `;

    return `${badge}${count < 2 ? "answer" : "answers"}`;
}

function Question(props) {
    return (
        <ListItem button divider>
            <RouterLink
                to={`questions/${props.id}`}
                style={{
                    display: "flex",
                    textDecoration: "none",
                    width: "100%"
                }}
            >
                <ListItemText>{props.body}</ListItemText>
                <ListItemSecondaryAction>
                    <Chip
                        label={formatAnswersBadge(props.answers)}
                        color="primary"
                    />
                </ListItemSecondaryAction>
            </RouterLink>
        </ListItem>
    );
}

function Questions(props) {
    const [value, setValue] = useState("");
    const [error, setError] = useState(null);
    const questions = [...props.store];

    questions.sort((a, b) => b.id - a.id);

    function handleChange(e) {
        const val = e.target.value;

        setValue(val);
    }

    function handleClick() {
        if (value.length < 5) {
            setError("The question must be at least 5 chars.");

            return;
        } else if (value.charAt(value.length - 1) !== "?") {
            setError("The question must end by a '?'.");

            return;
        }

        API.createQuestion(value).then(id => {
            props.dispatch({
                type: "ADD_QUESTION",
                question: { id, body: value, answers: [] }
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
                        Questions list
                    </Box>
                </Typography>
                <List>
                    {questions.map(question => (
                        <Question key={question.id} {...question} />
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
                        Ask
                    </Button>
                </Box>
            </section>
        </>
    );
}

export default withLayout(Questions);
