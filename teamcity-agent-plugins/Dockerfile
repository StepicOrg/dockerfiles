FROM stepik/teamcity-agent-stepik:2019.1.1

ENV PYENV_ROOT /opt/pyenv
ENV PYTHON_VERSION 3.6.2
ENV VIRTUALENV_COMMAND $PYENV_ROOT/versions/$PYTHON_VERSION/bin/python -m venv

RUN apt-get update && apt-get install -y --no-install-recommends \
    make gettext netbase sudo default-libmysqlclient-dev \
    build-essential libz-dev libreadline-dev libncursesw5-dev libssl-dev \
    libgdbm-dev libsqlite3-dev libbz2-dev liblzma-dev uuid-dev \
    gfortran libblas-dev liblapack-dev \
 && rm -rf /var/lib/apt/lists/*

# Install python via pyenv
RUN git clone https://github.com/yyuu/pyenv.git $PYENV_ROOT \
 && $PYENV_ROOT/bin/pyenv install $PYTHON_VERSION

# Enable sudo for user $USER
RUN echo "$USER ALL=(ALL) NOPASSWD:/usr/bin/pkill" > /etc/sudoers.d/plugins
