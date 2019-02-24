import * as React from "react";

export interface ButtonProps {
    primary?: boolean;
    secondary?: boolean;
    componentClass?: string;
    size?: "small" | "md" | "big";
}
export class Button extends React.Component<ButtonProps> {
    render() {
        const { primary, secondary, componentClass, size } = this.props;

        const classList: string[] = [];

        if (primary) classList.push("button__primary");
        if (secondary) classList.push("button__secondary");
        if (componentClass) classList.push(componentClass);
        if (size) classList.push(`button--${size}`);

        return (
            <a href="" target="_blank" className={`button ${classList.join(" ")}`}>
                {this.props.children}
            </a>
        );
    }
}
