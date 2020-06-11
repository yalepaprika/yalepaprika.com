import React, { Component } from 'react';
import { render } from 'react-dom';

// eslint-disable-next-line @typescript-eslint/no-empty-interface
export interface Props {}

interface State {
  seconds: number;
}

class Timer extends Component<Props, State> {
  private interval: ReturnType<typeof setTimeout> | null;
  constructor(props: Props) {
    super(props);
    this.interval = null;
    this.state = { seconds: 0 };
  }

  tick() {
    this.setState((state) => ({
      seconds: state.seconds + 1,
    }));
  }

  componentDidMount() {
    this.interval = setInterval(() => this.tick(), 1000);
  }

  componentWillUnmount() {
    if (this.interval) {
      clearInterval(this.interval);
    }
  }

  render() {
    return <div>Seconds: {this.state.seconds}</div>;
  }
}

render(<Timer />, document.getElementById('timer-placeholder'));
