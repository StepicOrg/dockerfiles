FROM stepik/teamcity-agent-base:2021.1.1

ENV ANSIBLE_VERSION 4.3.0
ENV ANSIBLE_CORE_VERSION 2.11.3
ENV OPENSHIFT_VERSION 0.12.1
ENV TERRAFORM_VERSION 1.0.3
ENV KUBECTL_VERSION 1.21.0
ENV HELM_VERSION 3.6.3

RUN apt-get update && apt-get install --no-install-recommends -y \
    python3 python3-dev python3-setuptools python3-pip gcc openssh-client wget \
 && rm -rf /var/lib/apt/lists/*

RUN pip3 install --no-cache-dir \
    ansible==$ANSIBLE_VERSION \
    ansible-core==$ANSIBLE_CORE_VERSION \
    openshift==$OPENSHIFT_VERSION

RUN mkdir -p /opt/ansible/roles && chown -R $USER:$USER /opt/ansible
COPY ansible.cfg $HOME/.ansible.cfg

RUN cd /tmp \
    # Install Terraform
    && wget https://releases.hashicorp.com/terraform/${TERRAFORM_VERSION}/terraform_${TERRAFORM_VERSION}_linux_amd64.zip \
    && unzip terraform_${TERRAFORM_VERSION}_linux_amd64.zip \
    && chmod +x terraform \
    && mv terraform /usr/local/bin \
    && rm terraform_${TERRAFORM_VERSION}_linux_amd64.zip \
    # Install kubectl
    && wget https://storage.googleapis.com/kubernetes-release/release/v${KUBECTL_VERSION}/bin/linux/amd64/kubectl \
    && chmod +x kubectl \
    && mv kubectl /usr/local/bin \
    # Install Helm
    && wget https://get.helm.sh/helm-v${HELM_VERSION}-linux-amd64.tar.gz \
    && tar zxf helm-v${HELM_VERSION}-linux-amd64.tar.gz \
    && mv linux-amd64/helm /usr/local/bin \
    && rm -rf linux-amd64 helm-v${HELM_VERSION}-linux-amd64.tar.gz

USER $USER
