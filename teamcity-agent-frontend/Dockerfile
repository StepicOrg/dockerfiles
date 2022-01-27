FROM stepik/teamcity-agent-base:2021.2

ENV NODEJS_VERSION 14.18.3

RUN apt-get update && apt-get install --no-install-recommends -y \
    bzip2 \
    gnupg \
    python3-venv \
 # Install node.js repository
 && curl -s https://deb.nodesource.com/gpgkey/nodesource.gpg.key | apt-key add - \
 && echo "deb https://deb.nodesource.com/node_14.x focal main" > /etc/apt/sources.list.d/nodesource.list \
 && apt-get update && apt-get install --no-install-recommends -y \
    nodejs=${NODEJS_VERSION}-deb-1nodesource1 \
 && npm install -g grunt-cli \
 && rm -rf /var/lib/apt/lists/* ~/.npm ~/.config /tmp/*

# Install Chrome Stable copied from https://hub.docker.com/r/justinribeiro/chrome-headless
RUN curl -sSL https://dl.google.com/linux/linux_signing_key.pub | apt-key add - \
	&& echo "deb [arch=amd64] https://dl.google.com/linux/chrome/deb/ stable main" > /etc/apt/sources.list.d/google-chrome.list \
	&& apt-get update && apt-get install -y \
	google-chrome-stable \
	--no-install-recommends \
	&& rm -rf /var/lib/apt/lists/*

RUN echo '{"interactive": false}' > $HOME/.bowerrc

USER $USER

# Create python venv and install yamllint
RUN python3 -m venv $HOME/.venv \
    && $HOME/.venv/bin/pip install -U pip \
    && $HOME/.venv/bin/pip install yamllint==1.20.0

ENV PATH $HOME/.venv/bin:$PATH
